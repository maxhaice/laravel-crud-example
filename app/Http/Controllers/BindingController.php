<?php

namespace App\Http\Controllers;

use App\Http\Resources\BindingResource;
use App\Models\Binding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BindingController extends Controller
{
    public function index()
    {
        $bindings = Binding::all();
        return response()->json(['message'=>'Success','data'=>$bindings],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateBinding();
        if($validator->fails()){
            return response()->json(['message'=>$validator->messages(),'data'=>null],400);
        }
        if(Binding::create($validator->validate())){
            return response()->json(['message'=>'Binding Created','data'=>$validator->validate()],200);
        }
        return response()->json(['message'=>'Error Ocurred','data'=>null],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Binding $binding)
    {
        return response()->json(['message'=>'Success','data'=>$binding],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Binding $binding)
    {
        if($binding->delete()){
            return response()->json(['message'=>'Binding Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'Error Occured','data'=>null],400);
    }

    public function validateBinding(){
        return Validator::make(request()->all(), [
            'point_1_id' => 'required|integer',
            'point_2_id' => 'required|integer',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Binding  $binding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Binding $binding)
    {
        $binding->update($request->all());

        return response(['project' => new BindingResource($binding), 'message' => 'Update successfully'], 200);
    }
}
