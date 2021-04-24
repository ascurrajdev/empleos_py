<?php
namespace App\Repositories\AuthProviders;

interface AuthProviderRepository{
    public function create(array $parameters);
    public function findByProveedor(string $proveedor);
}