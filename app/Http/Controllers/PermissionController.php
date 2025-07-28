<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;


class PermissionController extends Controller
{
    public function index($id){
        $data=Role::find( $id );
        $permissions = $data->permissions()->get();
        return response()->json($permissions);

        }
        public function store(Request $request,$id){
            $validated=$request->validate([
                "permission_id"=>"required|array",
                "permission_id.*"=>"exists:permissions,id"

            ]);
            $data=Role::findOrFail($id);
             $data->permissions()->syncWithoutDetaching($validated["permission_id"]//remember sync, attach 
            );
            
        return response()->json([
            "message"=>"permissions assigned",
            "role"=> $data->permissions
        ]);

        }
}
