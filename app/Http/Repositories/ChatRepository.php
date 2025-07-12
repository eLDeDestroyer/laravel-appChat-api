<?php

namespace App\Http\Repositories;

use App\Models\Chat;

class ChatRepository
{
    public function getChatByRoomId(int $room_id){
        $data  = Chat::query()->where("room_id", $room_id)->select("id", "text as chat", "room_id", "user_id")->get();
        return $data;
    }

    public function addChat(array $data){
        Chat::query()->insert($data);
    }

    public function deleteChat(int $room_id){
        Chat::query()->where("room_id", $room_id)->delete();
    }
}