<?php

namespace App\Http\Controllers\Cuenta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Posts\PostsRepository;

class PostsCuentaController extends Controller
{
    private $postsRepository;

    public function __construct(){
        $this->postsRepository = resolve(PostsRepository::class);
    }
    public function index(){
        $posts = $this->postsRepository->getAllFromUser(auth()->user());
        return view('publicaciones.cuenta.index',compact('posts'));
    }
}
