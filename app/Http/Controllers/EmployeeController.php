<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Department;
Use App\Models\Designation;
Use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title_name ="Add Employee";
        $department =Department::get();
        $designation=Designation::get();
        $emp =Employee::with('department')->with('designation')->get();
        return view('add-employee',compact('title_name','department','designation','emp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    

        $rules = [
             'mobile'=>'required',
             'email'=>'required',
            
        ];
        $validation =Validator::make($request->all(), $rules);
         if($validation->fails())
        {
            $errors = $validation->errors();
            $ajax['status'] = "error";
            $ajax['msg'] = $errors->all()[0];
        }
        else
        {
             $arr = $request->except('_token');
            
              $img =$request->image;
             if($request->hasFile('image'))
              {
                   $filename = $img->getClientOriginalName();
                    $ext = $img->getClientOriginalExtension();
                    $path = $img->move(public_path().'/uploads/',$filename);

                   $file ='uploads/'.$filename;
            
               }
               else
               {
                $file ='';
               }

          $id = Employee::create([
                 'name'=>$request->name,
                 'gender'=>$request->gender,
                 'mobile'=>$request->mobile,
                 'email'=>$request->email,
                 'address'=>$request->address,
                 'name'=>$request->name,
                 'department_id'=>$request->department_id,
                  'designation_id'=>$request->designation_id,
                 'image'=>$file,
                 'dob'=>Carbon::createFromFormat('d/m/Y',$request->dob),
                 'doj'=>Carbon::createFromFormat('d/m/Y',$request->doj),
                

            ]);

            $ajax['status'] = "success";
            $ajax['id'] = $id;
            $ajax['msg'] = 'Time  has been created';

        }

        echo json_encode($ajax);
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
        $title_name ="Edit Employee";
        $department =Department::get();
        $designation=Designation::get();
        $emp =Employee::with('department')->with('designation')->get();
        $employee =Employee::find($id);
        return view('edit-employee',compact('title_name','department','designation','emp','employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $rules = [
             'mobile'=>'required',
             'email'=>'required',
            
        ];
        $validation =Validator::make($request->all(), $rules);
         if($validation->fails())
        {
            $errors = $validation->errors();
            $ajax['status'] = "error";
            $ajax['msg'] = $errors->all()[0];
        }
        else
        {
             $arr = $request->except('_token');
            
              $img =$request->image;
             if($request->hasFile('image'))
              {
                   $filename = $img->getClientOriginalName();
                    $ext = $img->getClientOriginalExtension();
                    $path = $img->move(public_path().'/uploads/',$filename);

                   $file ='uploads/'.$filename;
            
               }
               else
               {
                $file ='';
               }

          $id = Employee::findOrFail($id)->update([
                 'name'=>$request->name,
                 'gender'=>$request->gender,
                 'mobile'=>$request->mobile,
                 'email'=>$request->email,
                 'address'=>$request->address,
                 'name'=>$request->name,
                 'department_id'=>$request->department_id,
                  'designation_id'=>$request->designation_id,
                 'image'=>$file,
                 'dob'=>Carbon::createFromFormat('d/m/Y',$request->dob),
                 'doj'=>Carbon::createFromFormat('d/m/Y',$request->doj),
                

            ]);

            $ajax['status'] = "success";
            $ajax['id'] = $id;
            $ajax['msg'] = 'Time  has been created';

        }

        echo json_encode($ajax);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp =Employee::find($id);
        $emp->delete();
        return redirect()->back()->with('status','Data has been deleted');
    }
}
