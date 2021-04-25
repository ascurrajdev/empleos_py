<?php
namespace App\Http\Controllers;
class PostsController extends Controller{
    public function __construct(){

    }
    public function index(){
        return view('publicaciones.index');
    }

    public function create(){
        return view('publicaciones.create'); 
    }
}