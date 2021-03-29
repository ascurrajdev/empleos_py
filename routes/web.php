<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login/{provider}','LoginController@redirectToProvider');
Route::get('/login/{provider}/callback','LoginController@handleCallback');
Auth::routes();
Route::get('/home',"HomeController@index")->name("home");
Route::prefix('publicaciones')->name('posts.')->group(function(){
    Route::get('','PostsController@index')->name('index');    
});