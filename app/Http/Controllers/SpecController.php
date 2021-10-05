<?php

namespace App\Http\Controllers;

use App\Models\Speclization;
use Illuminate\Http\Request;

class SpecController extends Controller
{

    public function index()
    {
        $speclized = Speclization::all();
        return view('spec_index' ,compact('speclized'));
    }


    public function create()
    {
        return view('spec_add');
    }

    public function store(Request $request)
    {
        $request_data = $request->validate([

            'name' => 'required|max:50|min:2'
        ]);

        Speclization::create($request_data);

        return redirect()->route('speclized.index')->with('success' , 'Edeted doctor successfully');  
    }

    public function show(Speclization $especlization)
    {
        //
    }

    public function edit($id)
    {
        $speclized = Speclization::find($id);

        if (!$speclized) {
            return redirect()->route('speclized.index')->with('error' , 'Not found!');
        }
        return view('spec_edit' ,compact('speclized'));

    }

    public function update(Request $request, $id)
    {
        $speclized = Speclization::find($id);
        $request_data = $request->except(['_token']);
        $request_data = $request->validate([
            'name' => 'required|max:50|min:2',
        ]);

        $speclized->update($request_data);
        return redirect()->route('speclized.index')->with('success' , 'Edeted doctor successfully');  
    }

    public function destroy($id)
    {
        $especlization = Speclization::find($id);

        $especlization->delete();
       return redirect()->route('speclized.index')->with('success' , 'Deleted doctor successfully'); 
    }
}
