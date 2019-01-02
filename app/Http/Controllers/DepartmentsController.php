<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Validator;
use Former;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::all();
        return view('Admin.Department.departments',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Department.add_department');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name' => 'required',
        ];
        $messages=[
        'name.required' => 'The name field is required',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try
        {
            $department=New Department;
            $department->name=$request->get('name');
            $department->save();
            return redirect()->route('department.index')->withSuccess('Insert record successfully.');
        }
        catch(\Exception $e)
        {
            return redirect()->route('department.index')->withError('error','Something went wrong, Please try after sometime.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        return view('Admin.Department.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('Admin.Department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $rules=[
                'name' => 'required',
            ];
            $messages=[
                'name.required' => 'The name field is required',
            ];
            $validator = Validator::make($request->all(),$rules,$messages);
            if ($validator->fails()) {
                Former::withErrors($validator);
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $department=Department::find($id);
            $department->update($request->all());
            return redirect()->route('department.index')->withSuccess('Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('department.index')->withSuccess('Deleted successfully');
    }
}
