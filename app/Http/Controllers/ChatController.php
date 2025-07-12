<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Services\ChatService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    protected $service;
    public function __construct(ChatService $service){
        $this->service = $service;
    }

    public function getChats(int $room_id){
        try {
            $data = $this->service->getChat($room_id);
            return Response::success($data, "success get char user");
        } catch (Exception $e) {
            return Response::error($e, "fails get char data", 400);
        }
    }

    public function addChat(Request $request){
        $userId = Auth::user()->id;
        try {
            $this->service->addChat($request->only("room_id", "chat"),$userId);
            return Response::success(null, "success add chat user");
        } catch (Exception $e) {
            return Response::error($e, "fails add chat data", 400);
        }
    }

    public function deleteChat(int $room_id){
        try {
            $this->service->deleteChat($room_id);
            return Response::success(null, "success delete chat user");
        } catch (Exception $e) {
            return Response::error($e, "fails delete chat data", 400);
        }
    }
}
