<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $title_name ='Designation';
        $designation = Designation::get();
        $department = Department::get();
        return view('designationlist',compact('title_name','designation','department'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            Designation::create([
                'name'=>$request->name,
                'department_id'=>$request->department_id,
                'description'=>$request->description,
            ]);

            // return response()->json(['message' => 'Data stored successfully'], 200);
            return redirect()->route('designation.index')->with('success','saved successfully');

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
}
