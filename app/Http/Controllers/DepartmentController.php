<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title_name ='Department';
        $department = Department::get();
        return view('departmentlist',compact('title_name','department'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator = $request->validate([
            'name'=>['required','string'],
        ]);

        
       
        if (!($validator)) {
           
             return Response::json(array(
        'success' => false,
        'errors' => $validator->getMessageBag()->toArray()

    ), 400);
          
        }
        
        
        else{
            Department::create([
                'name'=>$request->name,
                'description'=>$request->description,
            ]);

            // return response()->json(['message' => 'Data stored successfully'], 200);
            return redirect()->route('department.index')->with('success','saved successfully');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function search(Request $request)
    {
        $department =Designation::find($request->des_id);
        $ajax['department']=$department;
        echo json_encode($ajax);
    }
}
