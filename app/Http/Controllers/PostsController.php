<?php
namespace App\Http\Controllers;

use Validator;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Services\{PostsService,CategoriaPostService};

class PostsController extends Controller{
    private $postsService;
    private $categoriaPostService;

    public function __construct(){
        $this->postsService = resolve(PostsService::class);
        $this->categoriaPostService = resolve(CategoriaPostService::class);
        $this->middleware('auth')->only(['postularUserToPost','store','create']);
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
        $request->validate([
            "categoria_id" => "required|exists:categoria_posts,id",
            "titulo" => "required|string|min:8|max:255",
            "descripcion" => "required|string|min:8|max:65535",
            "beneficio" => "string|max:65535",
            "requisito" => "string|max:65535"
        ]);
        $this->postsService->save([
            "categoria_id" => $request->categoria_id,
            "user_id" => auth()->id(),
            "titulo" => $request->titulo,
            "descripcion" => $request->descripcion,
            "estado_convocatoria_id" => 1,
            "activo" => 1,
            "beneficio" => $request->beneficio,
            "requisito" => $request->requisito
        ]);

        return redirect()->route("posts.index");
    }

    public function show(Post $post){
        $post->load(['user','beneficios','requisitos','categoria']);
        $post->withCount(['postulaciones as postulado'=>function(Builder $query){
            $query->where('user_id','=',auth()->id());
        }]);
        return view("publicaciones.show",compact('post'));
    }

    public function postularUserToPost(Post $post){
        if(empty($post)){
            abort(404);
        }
        $this->postsService->postular([
            "post_id" => $post,
            "user_id" => auth()->id()
        ]);
        return redirect()->route('posts.show',$post)->with([
            "postulacionSuccess" => "La postulacion fue realizada correctamente"
        ]);
    }
}
