<?php

namespace App\Http\Controllers;

use App\Http\Resources\PointResource;
use App\Models\Branch;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PointController extends Controller
{
    public function index()
    {
        $points = Point::all();
        return response()->json(['message'=>'Success','data'=>$points],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Branch $branch)
    {
        $validator = $this->validatePoint();
        if($validator->fails()){
            return response()->json(['message'=>$validator->messages(),'data'=>null],400);
        }

        $point = new Point($validator->validate());
        if($branch->points()->save($point)){
            return response()->json(['message'=>'Comment Saved','data'=>$point],200);
        }

        return response()->json(['message'=>'Error Occured','data'=>null],400);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        return response()->json(['message'=>'Success','data'=>$point],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        $point->update($request->all());

        return response(['project' => new PointResource($point), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        if($point->delete()){
            return response()->json(['message'=>'Point Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'Error Occurred','data'=>null],400);
    }

    public function validatePoint(){
        return Validator::make(request()->all(), [
            'name' => 'required|string|min:3|max:255'
        ]);
    }}
