<?php
namespace App\Repositories\User;
use Hash;
use App\Models\User;
class UserRepositoryImp implements UserRepository{
    public function getUserFromEmail(string $email){
        return User::firstWhere('email',$email);
    }
    public function create(array $parameters){
        $user = new User;
        $user->name = $parameters["name"];
        $user->email = $parameters["email"];
        $user->password = Hash::make($parameters["password"]);
        $user->save();
        return $user;
    }
}