<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = Department::all();
        return response()->json($department);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required|string|min:1|max: 100'];
        
        $validator = \Validator::make($request->input(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator ->errors()->all()
            ], 400);
        }
        $department = new Department($request->input());
        $department->save();
        return response()->json([
            'status' => true,
            'message' => 'Department created succesfully'
        ], 200);

    }
    
    public function show(Department $department)
    {
        return response()->json(['status'=>true, 'data'=>$department]);
    }

    public function update(Request $request, Department $department)
    {
        $rules = ['name' => 'required|string|min:1|max: 100'];

        $validator = \Validator::make($request->input(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator ->errors()->all()
            ], 400);
        }
        $department->update($request->input());
        return response()->json([
            'status' => true,
            'message' => 'Department updated succesfully'
        ], 200);
    }
    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json([
            'status' => true,
            'message' => 'Department deleted succesfully'
        ], 200);
    }
}
