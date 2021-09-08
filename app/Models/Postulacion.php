<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = "postulaciones";

    protected $fillable = [
        "user_id","post_id"
    ];

    public function post(){
        return $this->belongsTo('App\Models\Post','post_id');
    }
    
}
