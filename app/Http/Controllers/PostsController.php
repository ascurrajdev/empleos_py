<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\{PostsService,CategoriaPostService};
use Validator;

class PostsController extends Controller{
    private $postsService;
    private $categoriaPostService;

    public function __construct(){
        $this->postsService = resolve(PostsService::class);
        $this->categoriaPostService = resolve(CategoriaPostService::class);
    }
    
    public function index(){
        $posts = $this->postsService->getAll();
        return view('publicaciones.index',compact('posts'));
    }

    public function create(){
        $categorias = $this->categoriaPostService->getAll();
        return view('publicaciones.create',compact('categorias')); 
    }

    public function store(Request $request){
        Validator::make($request->all(),[
            "categoria_id" => ["required","exists:categorias,id"],
            "titulo" => ["required","string","min:8","max:255"],
            "descripcion" => ["required","string","min:8","max:65535"],
        ]);
        $this->postsService->save([
            "categoria_id" => $request->categoria_id,
            "user_id" => auth()->id(),
            "titulo" => $request->titulo,
            "descripcion" => $request->descripcion,
            "estado_convocatoria_id" => 1,
            "activo" => 1
        ]);

        return redirect()->route("posts.index");
    }
}