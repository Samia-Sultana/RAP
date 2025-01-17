<?php

namespace App\Http\Controllers;

use App\Mail\userAccountCreated;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
{
    public function list(){
        $permissionUser = PermissionRole::getPermission('User', Auth::user()->role_id);
        if(empty($permissionUser)){
            abort(404);
        }
        $data['permissionAddUser'] = PermissionRole::getPermission('add user', Auth::user()->role_id);
        $data['permissionEditUser'] = PermissionRole::getPermission('edit user', Auth::user()->role_id);
        $data['permissionDeleteUser'] = PermissionRole::getPermission('delete user', Auth::user()->role_id);

        $data['getRecord'] = User::getRecord();
        return view('user.list', $data);
    }

    public function add(){
        $permissionUserAdd = PermissionRole::getPermission('add user', Auth::user()->role_id);
        if(empty($permissionUserAdd)){
            abort(404);
        }
        $data['getRole'] = Role::getRecord();
        return view('user.add', $data);
    }

    public function insert(Request $request){
        $permissionUserAdd = PermissionRole::getPermission('add user', Auth::user()->role_id);
        if(empty($permissionUserAdd)){
            abort(404);
        }
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

    public function sendEmail($id)
    {
        try {
            // Find the user or fail
            $user = User::findOrFail($id);

            // Check if the user has an email
            if ($user->email) {
                // Send the email using the Mailable class
                Mail::to($user->email)->send(new userAccountCreated($user));

                // Return success response
                return redirect()->back()->with('message', 'Mail sent successfully');
            } else {
                // Handle the case where the user has no email
                return redirect()->back()->with('error', 'User does not have a valid email address');
            }
        } catch (\Exception $e) {
            // Catch exceptions and return error message
            return redirect()->back()->with('error', 'Failed to send mail: ' . $e->getMessage());
        }
    }


}
