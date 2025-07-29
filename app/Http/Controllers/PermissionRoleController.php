<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;


class PermissionRoleController extends Controller
{
    public function index($id){
        $data=Role::find( $id );
        $permissions = $data->permissions()->where("role_id",$id)->get();
        return response()->json($permissions);

        }
        public function store(Request $request,$id){
            $validated=$request->validate([
                "permission_id"=>"required|array",
                "permission_id.*"=>"exists:permissions,id"//For each item in the array permission_id, check if it exists in the permissions table.

            ]);
            $data=Role::findOrFail($id);
             $data->permissions()->sync($validated["permission_id"]//remember sync, attach 
            );
            
        return response()->json([
            "message"=>"permissions assigned",
            "role"=> $data->permissions
        ]);

        }
        
}
