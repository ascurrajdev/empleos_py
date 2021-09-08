<?php
namespace App\Repositories\Postulaciones;
use App\Models\Postulacion;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class PostulacionesRepositoryImp implements PostulacionesRepository{
    public function save(array $parameters):void{
        Postulacion::create([
            "user_id" => $parameters["user_id"],
            "post_id" => $parameters["post_id"]
        ]);
    }
    public function getAllFromUser($user):Collection{
        if($user instanceof User){
            $user->load('postulaciones');
        }else{
            $user = User::find($user)->with('postulaciones');
        }
        return $user->postulaciones;
    }
}