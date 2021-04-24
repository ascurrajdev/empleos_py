<?php
namespace App\Services;

use App\Repositories\AuthProviders\AuthProviderRepository;
use App\Repositories\AuthProviderUsers\AuthProviderUserRepository;

class AuthProviderUserService{
    private $authProviderRepository,$authProviderUserRepository;
    public function __construct(){
        $this->authProviderRepository = resolve(AuthProviderRepository::class);
        $this->authProviderUserRepository = resolve(AuthProviderUserRepository::class);
    }

    public function syncUserWithProvider($user,string $proveedor){
        $proveedorModel = $this->authProviderRepository->findByProveedor($proveedor);
        $parameters = array();
        $parameters["user_id"] = $user->id;
        $parameters["proveedor_id"] = $proveedorModel->id;
        $authProviderUserCreate = $this->authProviderUserRepository->create($parameters);
        if(!$authProviderUserCreate){
            return false;
        }
        return true;
    }
}