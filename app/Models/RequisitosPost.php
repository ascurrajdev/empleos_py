<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitosPost extends Model
{
    use HasFactory;
    protected $fillable = [
        "requisito","post_id"
    ];
}
