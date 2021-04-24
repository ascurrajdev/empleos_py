<?php
namespace App\Services;

use App\Repositories\User\UserRepository;

class UserService{
    private $userRepository;
    public function __construct(){
        $this->userRepository = resolve(UserRepository::class);
    }

    public function getUserFromEmail(string $email = ""){
        return $this->userRepository->getUserFromEmail($email);
    }

    public function create(array $parameters){
        return $this->userRepository->create($parameters);
    }
}