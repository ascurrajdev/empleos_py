<?php
namespace App\Repositories\Postulaciones;
use App\Models\Postulacion;
class PostulacionesRepositoryImp implements PostulacionesRepository{
    public function save(array $parameters):void{
        Postulacion::create([
            "user_id" => $parameters["user_id"],
            "post_id" => $parameters["post_id"]
        ]);
    }
}