<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("/users/login", [AuthController::class, "signin"]);
Route::post("/users/register", [AuthController::class, "signup"]);

Route::middleware(["auth"])->group(function (){

});