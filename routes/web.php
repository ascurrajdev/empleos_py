<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publicaciones\PostsController;
use App\Http\Controllers\Publicaciones\PostulacionesController;
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

Route::redirect('/','/publicaciones');
Route::get('/login/{provider}','Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback','Auth\LoginController@handleCallbackProvider');
Auth::routes();
Route::get('/auth/{provider}/callback','Auth\AuthSocialiteController@handleRedirect');
Route::get('/home',"HomeController@index")->name("home")->middleware('auth');
Route::prefix('publicaciones')->name('posts.')->group(function(){
    Route::post('',[PostsController::class,'store'])->name('store');
    Route::get('',[PostsController::class,'index'])->name('index');
    Route::get('create',[PostsController::class,'create'])->name('create');
    Route::get('{post}',[PostsController::class,'show'])->name('show');
    Route::post('{post}/postular',[PostsController::class,'postularUserToPost'])->name('postular');
    Route::prefix("{post}/postulaciones")->name("postulaciones.")->group(function(){
        Route::get("",[PostulacionesController::class,"index"])->name("index");
    });
});
Route::prefix('cuenta')->middleware('auth')->name('users.')->group(function(){
    Route::prefix('publicaciones')->name('posts.')->group(function(){
        Route::get('',[PostsCuentaController::class,'index'])->name('index');
    });
    Route::prefix("configuracion")->name("cuenta.")->group(function(){
        Route::get('',[CuentaController::class,'showConfiguracionCuenta'])->name('configuracion');
    });
    Route::prefix('postulaciones')->name('postulaciones.')->group(function(){
        Route::get('',[PostulacionesCuentaController::class,'getAllPostulacionesUser'])->name('index');
    });
    Route::prefix('mensajes')->name('mensajes.')->group(function(){
        Route::get('',[MensajesCuentaController::class,'index'])->name('index');
    });
});