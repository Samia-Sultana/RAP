<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function list(){
        $data['getRecord'] = Role::getRecord();
        return view('role.list', $data);
    }

    public function add(){
        return view('role.add');
    }
    public function insert(Request $request){
        $role = Role::create($request->all());
        return redirect()->back()->with('success', 'Role created successfully');
    }

    public function edit($id){
        $data['getRecord'] = Role::getSingle($id);
        return view('role.edit', $data);
    }

    public function update($id, Request $request){
        $role = Role::getSingle($id);
        $role->name = $request->name;
        $role->save();
        return redirect()->back()->with('success', 'Role updated successfully');
    }

    public function delete($id, Request $request){
        $role = Role::getSingle($id);
        $role->delete();
        return redirect()->back()->with('success', 'Role deleted successfully');
    }


}
