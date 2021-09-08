<?php

namespace App\Http\Controllers\Cuenta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Postulaciones\PostulacionesRepository;
class PostulacionesCuentaController extends Controller
{
    private $postulacionesRepository;
    public function __construct(){
        $this->postulacionesRepository = resolve(PostulacionesRepository::class);
    }
    public function getAllPostulacionesUser(){
        $postulaciones = $this->postulacionesRepository->getAllFromUser(auth()->user());
        return view('postulaciones.index',compact('postulaciones'));
    }
}
