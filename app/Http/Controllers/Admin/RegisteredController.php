<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class RegisteredController extends Controller
{
    public function index()
    {
        // $users = User::paginate(2);  custom pagination
        // $users = User::all();
        $users = User::where('role_as', Request::input('roles'))->get();

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
        $user->name= $request->Input('name');
        $user->role_as= $request->Input('roles');
        $user->update();

        return redirect()->back()->with('status','Role is Updated');
    }
}





