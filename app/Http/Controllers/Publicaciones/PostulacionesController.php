<?php

namespace App\Http\Controllers\Publicaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postulacion;
use App\Models\Post;
use Gate;

class PostulacionesController extends Controller
{
    public function index(Post $post){
        $this->authorize("view",$post);
        $postulaciones = Postulacion::where("post_id",$post->id)->with('user')->get();
        return $postulaciones;
    }
}
