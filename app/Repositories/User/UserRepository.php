<?php
namespace App\Repositories\User;
interface UserRepository{
    public function getUserFromEmail(string $email);
    public function create(array $parameters);
}