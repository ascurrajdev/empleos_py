<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cuenta\CuentaController;
use App\Http\Controllers\Cuenta\PostulacionesCuentaController;
use App\Http\Controllers\Cuenta\PostsCuentaController;
use App\Http\Controllers\Cuenta\MensajesCuentaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/','/login');
Route::get('/login/{provider}','Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback','Auth\LoginController@handleCallbackProvider');
Auth::routes();
Route::get('/auth/{provider}/callback','Auth\AuthSocialiteController@handleRedirect');
Route::get('/home',"HomeController@index")->name("home");
Route::prefix('cuenta')->group(function(){
    Route::prefix('publicaciones')->name('posts.')->group(function(){
        Route::get('',[PostsCuentaController::class,'index'])->name('index');    
    });
    Route::get('configuracion',[CuentaController::class,'showConfiguracionCuenta'])->name('cuenta.configuracion');
    Route::prefix('postulaciones')->group(function(){
        Route::get('',[PostulacionesCuentaController::class,'getAllPostulacionesUser']);
    });
    Route::prefix('mensajes')->group(function(){
        Route::get('',[MensajesCuentaController::class,'index']);
    });
});