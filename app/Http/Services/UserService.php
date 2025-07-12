<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;

class UserService
{
    protected $repo;
    public function __construct(UserRepository $repo) {
        $this->repo = $repo;
    }

    public function getDataUser(int $user_id){
        return $this->repo->getDataUser($user_id);
    }

    public function updateUser(array $data, int $user_id){
        return $this->repo->updateDataUser($data, $user_id);
    }
}