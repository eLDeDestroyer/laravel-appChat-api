<?php

namespace App\Http\Services;

use App\Http\Repositories\FriendRepository;

class FriendService
{
    protected $repo;
    public function __construct(FriendRepository $repo) {
        $this->repo = $repo;
    }

    public function getFriendUser(int $room_id, int $user_id){
        return $this->repo->getFriendUser($room_id, $user_id);
    }

    public function AddFriend(array $data,int $user_id){
        $roomId = $this->repo->createRoomChat();
        $friendId = $this->repo->getUserByNumber($data["unique_number"]);


        $datas = [
            [
                "name" => $data["name"],
                "friend" => $friendId,
                "user_id" => $user_id,
                "room_id" => $roomId,
            ],
            [
                "name" => "",
                "friend" => $user_id,
                "user_id" => $friendId,
                "room_id" => $roomId,
            ]
        ];

        foreach ($datas as $data) {
            $this->repo->addFriend($data);
        }
    }


    public function updateFriend(array $data, int $friend_id){
        $data["friend_id"] = $friend_id;
        $this->repo->updateFriend($data);
    }

    public function getAllFriends(int $user_id){
        $data  = $this->repo->getAllFriends($user_id);
        return $data;
    }


}