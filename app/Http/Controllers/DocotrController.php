<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Speclization;

use Illuminate\Http\Request;


class DocotrController extends Controller
{

    public function index()
    {
        $doctors = Doctors::with('speclized')->get();
        return view('doc_index' ,compact('doctors'));
    }


    public function create()
    {
        $speclization = Speclization::all();
        return view('doc_add' ,compact('speclization'));
    }

    public function store(Request $request)
    {

        $request_data = $request->validate([

            'first_name' => 'required|max:50|min:2',
            'last_name' => 'required|max:50|min:2',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'address' => 'required',
            'specioliza_id' => 'required',
        ]);

        Doctors::create($request_data);

        return redirect()->route('doctor.index')->with('success' , 'ِAdd new doctor successfully');  
    }


    public function show(Doctors $doctors)
    {
        //
    }


    public function edit(Doctors $doctors ,$id)
    {

        $speclized = Speclization::all();
        $doctor = Doctors::find($id);

    if (!$doctor) {
        return redirect()->route('doctor.index')->with('error' , 'Not found!');
    }
        return view('doc_edit' ,compact('doctor','speclized'));
    }


    public function update(Request $request, Doctors $doctor)
    {
        
        $request_data = $request->validate([

            'first_name' => 'required|max:50|min:2',
            'last_name' => 'required|max:50|min:2',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'address' => 'required',
            'specioliza_id' => 'required',
            
        ]);

        $doctor->update($request_data);
        return redirect()->route('doctor.index')->with('success' , 'Edeted doctor successfully');  
    }


    public function destroy($id)
    {
        $doctor = Doctors::find($id);

         $doctor->delete();
        return redirect()->route('doctor.index')->with('success' , 'Deleted doctor successfully'); 
    }
}
