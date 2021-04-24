<?php

namespace App\Http\Controllers\Cuenta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CuentaController extends Controller
{
    public function __construct(){

    }

    public function showConfiguracionCuenta(){
        return view('cuenta.configuracion');
    }
}
