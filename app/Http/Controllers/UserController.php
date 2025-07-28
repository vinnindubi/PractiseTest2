<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
public function index(){
    $users = User::all();
    return response()->json([
        "message"=>"users returned",
        "data"=> $users
    ]);
}
public function store(Request $request){
    $validated= $request->validate([
        "name"=> "required",
        "email"=> "required|email",
        "password"=> "required",
        "confirm_password"=>"required|same:password"
    ]);
    $user = User::create([
        "name"=> $validated["name"],
        "email"=> $validated["email"],
        "password"=> $validated["password"]
    ]);
    return response()->json([
        'message'=>"user created",
        "data"=>$user
    ]);
}
public function show($id){
    $user = User::find($id);
    return response()->json([
        'message'=>"users fetched",
        "data"=>$user
    ]);
}
public function update(Request $request, $id){
    $validated= $request->validate([
        "name"=> "required",
        "email"=> "required|email",
        "password"=> "required",
        "confirm_password"=>"reequired|same:password"
    ]);
    $user = User::find($id);
    $user->update([
        "name"=> $validated["name"],
        "email"=> $validated["email"],
        "password"=> $validated["password"]
    ]);
    return response()->json([
        'message'=>"user updated",
        "data"=>$user
    ]);
}
public function destroy($id){
    $user = User::find($id);
    $user->delete();
    return response()->json([
        'message'=>"users deleted",
        "data"=>null
    ]);
}


}
