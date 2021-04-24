<?php

namespace App\Http\Controllers\Cuenta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MensajesCuentaController extends Controller
{
    public function index(){
        return view('mensajes.index');
    }
}
