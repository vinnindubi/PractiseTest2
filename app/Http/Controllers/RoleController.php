<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return response()->json([
            "message"=> "all roles returned",
            "Role"=> $roles

        ], 200);

    }
    public function store(Request $request){
        $validated = $request->validate([
            "name"=> "required",
            "description"=>"required",
        ]);
        $role = Role::create([
            "name"=> $validated["name"],
            "description"=> $validated["description"],
        ]);
        return response()->json([
            "message"=> "role created",
            "Role"=> $role

        ], 200);
    }
    public function show($id){
        $role = Role::find($id);
        return response()->json([
            "message"=> "role created",
            "Role"=> $role
        ], 200);
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            "name"=> "required",
            "description"=> "required",
        ]);
        $role = Role::find($id);
        $role->update([
            "name"=> $validated["name"],
            "description"=> $validated["description"],
        ]);
        return response()->json([
            "message"=> "role updated",
            "Role"=> $role

        ], 200);
    }
    public function destroy($id){
        $role = Role::find($id);
        $role->delete();
        return response()->json([
            "message"=> "role deleted"
        ],200);
    }

   
}
