<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostsService;
use Validator;

class PostsController extends Controller{
    private $postsService;

    public function __construct(){
        $this->postsService = resolve(PostsService::class);
    }
    
    public function index(){
        return view('publicaciones.index');
    }

    public function create(){
        return view('publicaciones.create'); 
    }

    public function store(Request $request){
        Validator::make($request->all(),[
            "categoria_id" => ["required","exists:categorias,id"],
            "titulo" => ["required","string","min:8","max:255"],
            "descripcion" => ["required","string","min:8","max:65535"],
        ]);

    }
}