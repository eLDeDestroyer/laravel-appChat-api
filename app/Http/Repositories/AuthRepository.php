<?php

namespace App\Http\Repositories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    public function createUser(array $data)
    {
        User::insert([
            "username" => $data["username"],
            "name" => $data["name"],
            "password" => Hash::make($data["password"])
        ]);
    } 
    
    public function getUserId(string $username): int{
        $userId = User::where("username", $username)->first()->id;
        
        return $userId;
    }

    public function addLoginTime(string $username){
        User::query()->where("username", $username)->update([
            "last_login" => Carbon::now()
        ]);
    }
}