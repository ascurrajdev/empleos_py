<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthProviderUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'proveedor_id','user_id'
    ];
}
