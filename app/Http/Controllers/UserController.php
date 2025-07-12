<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $service;
    public function __construct(UserService $service){
        $this->service = $service;
    }

    public function getDataUser(){
        $userId = Auth::user()->id;

        try {
            $data = $this->service->getDataUser($userId);
            return Response::success($data);
        } catch (Exception $e) {
            return Response::error($e, "fails get data", 400);
        }
    }


    public function updateDataUser(Request $request){
        $userId = Auth::user()->id;

        try {
            $this->service->updateUser($request->only("username", "name"),$userId);
            return Response::success(null, "success update user");
        } catch (Exception $e) {
            return Response::error($e, "fails get data", 400);
        }
    }


}
