<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Departments::all();
        return view('dept_index' ,compact('departments'));
    }


    public function create()
    {
        return view('dept_add');
    }


    public function store(Request $request)
    {
        $request_data = $request->validate([

            'name' => 'required|max:50|min:2'
        ]);

        Departments::create($request_data);

        return redirect()->route('department.index')->with('success' , 'Edeted doctor successfully');  
    }


    public function show(Departments $departments)
    {
        //
    }


    public function edit( $id)
    {
        $department = Departments::find($id);

        if (!$department) {
            return redirect()->route('department.index')->with('error' , 'Not found!');
        }
        return view('dept_edit' ,compact('department'));
    }


    public function update(Request $request,  $id)
    {
        $department = Departments::find($id);
        $request_data = $request->except(['_token']);
        $request_data = $request->validate([
            'name' => 'required|max:50|min:2',
        ]);

        $department->update($request_data);
        return redirect()->route('department.index')->with('success' , 'Edeted doctor successfully');
    }


    public function destroy( $id)
    {
        $department = Departments::find($id);

        $department->delete();
       return redirect()->route('department.index')->with('success' , 'Deleted doctor successfully'); 
    }
}
