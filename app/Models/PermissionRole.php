<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;
    protected $table = 'permission_role';
    protected $guard =[];
    static public function InsertUpdateRecord($permission_ids, $role_id){
        foreach($permission_ids as $permission_id){
            $save = new PermissionRole();
            $save->permission_id = $permission_id;
            $save->role_id = $role_id;
            $save->save();
        }
    }

    static function getRolePermission($role_id){
        return PermissionRole::where('role_id', '=', $role_id)->get();

    }

    static function getPermission($slug, $role_id){
        return PermissionRole::select('permission_role.id')
        ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
        ->where('permission_role.role_id', '=', $role_id)
        ->where('permissions.slug', '=', $slug)
        ->count();

    }
}
