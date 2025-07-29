<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class UserRoleController extends Controller
{
    public function index($id){
        $roles = Role::find($id);
    }
    public function store(Request $request,$id){
        $validated = $request->validate([
            "role_id"=> "required|array",
            "role_id*"=> "exists:roles,id",
        ]);
        $data=User::find($id);
        $value=$data->roles()->sync($validated["role_id"]);

        return response()->json([
            "message"=>"role attached to user",
            "results"=>$data->roles,
        ]);
    }

}
