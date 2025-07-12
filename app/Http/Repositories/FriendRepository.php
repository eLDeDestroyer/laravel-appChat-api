<?php

namespace App\Http\Repositories;

use App\Models\Friend;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FriendRepository
{
    public function getFriendUser(int $room_id, int $user_id){
        $data = Friend::query()->where("room_id", $room_id)->where("user_id", $user_id)->first();
        return $data;
    }

    public function createRoomChat(){
        $roomId = Room::query()->insertGetId([]);
        return $roomId;
    }

    public function getUserByNumber(string $number){
        $userId = User::query()->where("unique_number", $number)->first()->id;
        return $userId;
    }

    public function addFriend(array $data){
        Friend::query()->insert($data);
    }

    public function updateFriend(array $data){
        Friend::query()->where("id", $data["friend_id"])->update([
            "name" => $data["name"],
        ]);
    }


    public function getAllFriends(int $user_id){
        $data  = DB::table("friends")
            ->join("users", "users.id", "=", "friends.user_id")
            ->select("users.unique_number as unique_number", "friends.name as name", "friends.room_id as room_id", "users.id as id")
            ->where("friends.user_id", $user_id)
            ->get();
        
        return $data;
    }
}