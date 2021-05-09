<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchResource;
use App\Models\Binding;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;


class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return response()->json(['message'=>'Success','data'=>$branches],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateBranch();
        if($validator->fails()){
            return response()->json(['message'=>$validator->messages(),'data'=>null],400);
        }
        if(Branch::create($validator->validate())){
            return response()->json(['message'=>'Branch Created','data'=>$validator->validate()],200);
        }
        return response()->json(['message'=>'Error Ocurred','data'=>null],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return response()->json(['message'=>'Success','data'=>$branch],200);
    }

    public function show_points(Branch $branch){
        $points = $branch->points;
        if(count($points) > 0){
            return response()->json(['message'=>'Success','data'=>$points],200);
        }
        return response()->json(['message'=>'No Comment Found','data'=>null],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $branch->update($request->all());

        return response(['branch' => new BranchResource($branch), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        if($branch->delete()){
            return response()->json(['message'=>'Branch Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'Error Occured','data'=>null],400);
    }

    public function validateBranch(){
        return Validator::make(request()->all(), [
            'color' => 'required|string|min:3|max:25',
            'name' => 'required|string|min:5|max:255',
        ]);
    }
}
