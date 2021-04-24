<?php

namespace App\Http\Controllers\Cuenta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostulacionesCuentaController extends Controller
{
    public function getAllPostulacionesUser(){
        return view('postulaciones.index');
    }
}
