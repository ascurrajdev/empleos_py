<?php
namespace App\Repositories\AuthProviders;
use App\Models\AuthProvider;
class AuthProviderRepositoryImp implements AuthProviderRepository{
    public function create(array $parameters){
        return AuthProvider::create($parameters);
    }

    public function findByProveedor(string $proveedor){
        return AuthProvider::firstWhere('proveedor',$proveedor);
    }
}