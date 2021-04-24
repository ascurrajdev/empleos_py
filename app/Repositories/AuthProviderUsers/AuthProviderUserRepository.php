<?php
namespace App\Repositories\AuthProviderUsers;
use App\Models\User;
interface AuthProviderUserRepository{
    public function findByUserId(int $userId);    
    public function findByUserIdAndAuthProvider(int $userId,int $proveedorId);
    public function create(array $parameters);
}