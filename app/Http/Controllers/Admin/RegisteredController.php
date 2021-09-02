<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisteredController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::paginate(2);  custom pagination
        // $users = User::all();
        $users = User::where('role_as', $request->input('roles'))->get();

         return view('admin.users.index')->with('users',$users);
    }
    public function edit($id)
    {
        $user_roles = User::find($id);
        return view ('admin.users.edit')->with('user_roles',$user_roles);
    }
    public function updaterole (Request $request , $id)
    {
        $user = User::find($id);
        $user->name= $request->input('name');
        $user->role_as= $request->input('roles');
        $user->update();

        return redirect('registered-user')->with('status','Role is Updated');
    }
}





