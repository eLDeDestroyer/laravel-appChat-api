<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("/users/login", [AuthController::class, "signin"]);
Route::post("/users/register", [AuthController::class, "signup"]);

Route::middleware(["auth"])->group(function (){
    Route::get("/auth/users/me", [UserController::class,"getDataUser"]);
    Route::patch("/auth/users/update", [UserController::class,"updateDataUser"]);

    Route::get("/auth/friend/{room_id}", [FriendController::class,"getFriend"]);
    Route::post("/auth/friend/add", [FriendController::class,"addFriend"]);
    Route::patch("/auth/friend/update/{friend_id}", [FriendController::class,"updateFriend"]);
    Route::get("/auth/friends", [FriendController::class,"getAllFriends"]);
});