<?php

namespace App\Http\Controllers\Cuenta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsCuentaController extends Controller
{
    public function index(){
        return view('publicaciones.index');
    }
}
