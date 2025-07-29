<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionRoleController;
use App\Http\Controllers\UserRoleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('/users',UserController::class);
Route::apiResource('/roles',RoleController::class);

Route::get('/user/{id}/roles', [UserRoleController::class,'index'])->name('index');
Route::post('/user/{id}/roles', [UserRoleController::class,'store'])->name('store');

Route::get('/role/{id}/permission',[PermissionRoleController::class,'index'])->name('index');
Route::post('/role/{id}/permission',[PermissionRoleController::class,'store'])->name('store');