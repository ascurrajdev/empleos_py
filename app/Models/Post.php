<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "categoria_id",
        "user_id",
        "titulo",
        "descripcion",
        "estado_convocatoria_id",
        "activo",
        "icon"
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function requisitos(){
        return $this->hasOne('App\Models\RequisitosPost');
    }

    public function beneficios(){
        return $this->hasOne('App\Models\BeneficiosPost');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\CategoriaPost','categoria_id');
    }
}
