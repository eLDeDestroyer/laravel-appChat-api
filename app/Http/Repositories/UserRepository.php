<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function getDataUser(int $user_id){
        $data = DB::table("users")->where("id", $user_id)
            ->select("id", "unique_number", "name", "username", "last_login")
            ->first();

        return $data;
    }

    public function updateDataUser(array $data, int $user_id){
        User::query()->where("id", $user_id)->update([
            "name" => $data["name"],
            "username" => $data["username"],
        ]);
    }
}