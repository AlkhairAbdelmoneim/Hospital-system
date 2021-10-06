<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Departments;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employees::with('department')->get();
        return view('em_index' ,compact('employees'));
    }


    public function create()
    {
        $department = Departments::all();
        return view('em_add' , compact('department'));
    }


    public function store(Request $request)
    {

        $request_data = $request->except(['_token']) ;
        $request_data = $request->validate([

            'first_name' => 'required|max:50|min:2',
            'last_name' => 'required|max:50|min:2',
            'phone' => 'required|min:10',
            'address' => 'required',
            'dept_id' => 'required',
        ]);
        Employees::create($request_data);

        return redirect()->route('employee.index')->with('success' , 'ِAdd new doctor successfully');
    }


    public function show(Employees $employees)
    {
        //
    }


    public function edit( $id)
    {
        $department = Departments::all();
        $employee = Employees::find($id);

        if (!$employee) {
            return redirect()->route('employee.index')->with('error' , 'Not found!');
        }
            return view('em_edit' ,compact('employee' ,'department'));
    }


    public function update(Request $request ,$id)
    {
        // return $request;
        $request_data = $request->except(['_token']);
        $employee = Employees::find($id);
        $request_data = $request->validate([

            'first_name' => 'required|max:50|min:2',
            'last_name' => 'required|max:50|min:2',
            'phone' => 'required|min:10',
            'address' => 'required',
            'dept_id' => 'required',
        ]);

        $employee->update($request_data);
        return redirect()->route('employee.index')->with('success' , 'Edeted doctor successfully');  
    }

    public function destroy( $id)
    {
        $employee = Employees::find($id);

        $employee->delete();
       return redirect()->route('employee.index')->with('success' , 'Deleted doctor successfully'); 
    }
}
