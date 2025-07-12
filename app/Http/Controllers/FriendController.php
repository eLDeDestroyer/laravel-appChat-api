<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Services\FriendService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    protected $service;
    public function __construct(FriendService $service){
        $this->service = $service;
    }

    public function getFriend(int $room_id){
        $userId = Auth::user()->id;
        try {
            $data = $this->service->getFriendUser($room_id,$userId);
            return Response::success($data, "success get data user");
        } catch (Exception $e) {
            return Response::error($e, "fails get data", 400);
        }
    }

    public function addFriend(Request $request){
        $userId = Auth::user()->id;
        try {
            $this->service->AddFriend($request->only("name", "unique_number"),$userId);
            return Response::success(null, "success add friend user");
        } catch (Exception $e) {
            return Response::error($e, "fails add friend data", 400);
        }
    }

    public function updateFriend(Request $request, int $friend_id){
        try {
            $this->service->updateFriend($request->only("name"),$friend_id);
            return Response::success(null, "success update friend user");
        } catch (Exception $e) {
            return Response::error($e, "fails update friend data", 400);
        }
    }

    public function getAllFriends(Request $request){
        $userId = Auth::user()->id;
        try {
            $data = $this->service->getAllFriends($userId);
            return Response::success($data, "success get friend user");
        } catch (Exception $e) {
            return Response::error($e, "fails get friend data", 400);
        }
    }

}
