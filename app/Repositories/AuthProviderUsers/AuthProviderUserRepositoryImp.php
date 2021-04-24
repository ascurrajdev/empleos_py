<?php
namespace App\Repositories\AuthProviderUsers;
use App\Models\AuthProviderUser;
class AuthProviderUserRepositoryImp implements AuthProviderUserRepository{
    public function findByUserId(int $userId){
        return AuthProviderUser::where('user_id',$user_id);
    }
    public function findByUserIdAndAuthProvider(int $userId,int $proveedorId){
        return AuthProviderUser::where('user_id',$userId)->where('proveedor_id',$proveedorId)->first();
    }
    public function create(array $parameters){
        return AuthProviderUser::create([
            "user_id" => $parameters["user_id"],
            "proveedor_id" => $parameters["proveedor_id"]
        ]);
    }
}