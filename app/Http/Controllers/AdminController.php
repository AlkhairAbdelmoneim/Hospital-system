<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin_index' ,compact('users'));
    }


    public function create()
    {
        return view('admin_add');
    }


    public function store(Request $request)
    {
        $request_data = $request->except(['_token']) ;
        $request_data = $request->validate([

            'name' => 'required|max:50|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $request_data['password'] = Hash::make($request_data['password']);

        User::create($request_data);

        return redirect()->route('admin.index')->with('success' , 'Add new Admin successfully');
    }


    public function show(User $user)
    {
        //
    }


    public function edit( $id)
    {
        $admin = User::find($id);

        if (!$admin) {
            return redirect()->route('admin.index')->with('error' , 'Not found!');
        }

        return view('admin_edit' ,compact('admin'));
    }


    public function update(Request $request,  $id)
    {
        $user = User::find($id);
        $request_data = $request->except(['_token']);
        $request_data = $request->validate([

            'name' => 'required|max:50|min:3',
            'email' => 'required|email',
            'password' => 'min:8',
        ]);

        $request_data['password'] = Hash::make($request_data['password']);

        $user->update($request_data);

        return redirect()->route('admin.index')->with('success' , 'Edited user successfully');
    }

    public function destroy( $id)
    {
        $user = User::find($id);

        $user->delete();
       return redirect()->route('admin.index')->with('success' , 'Deleted user successfully'); 
    }
}
