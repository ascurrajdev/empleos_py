<?php
namespace App\Repositories\Postulaciones;
use Illuminate\Database\Eloquent\Collection;
interface PostulacionesRepository{
    public function save(array $parameters):void;
    public function getAllFromUser($user):Collection;
}