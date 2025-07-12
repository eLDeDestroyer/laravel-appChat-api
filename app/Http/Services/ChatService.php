<?php

namespace App\Http\Services;

use App\Http\Repositories\ChatRepository;

class ChatService
{
    protected $repo;
    public function __construct(ChatRepository $repo) {
        $this->repo = $repo;
    }


    public function getChat(int $room_id){
        $data = $this->repo->getChatByRoomId($room_id);
        return $data;
    }

    public function addChat(array $data, int $user_id){
        $newData = [
            "user_id" => $user_id,
            "text" => $data["chat"],
            "room_id" => $data["room_id"]
        ];
        $this->repo->addChat($newData);
    }

    public function deleteChat(int $room_id){
        $this->repo->deleteChat($room_id);
    }
}