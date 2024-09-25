<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getRecord();
        return view('user.list', $data);
    }

    public function add(){
        $data['getRole'] = Role::getRecord();
        return view('user.add', $data);
    }

    public function insert(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users'
        ]);
        $save = new User;
        $save->name = $request->name;
        $save->email =  $request->email;
        $save->password = bcrypt($request->password);
        $save->role_id = $request->role_id;
        $save->save();
        return redirect('user')->with('success', 'user created successfully');

    }

}
