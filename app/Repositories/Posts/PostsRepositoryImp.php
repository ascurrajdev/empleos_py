<?php
namespace App\Repositories\Posts;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostsRepositoryImp implements PostsRepository{
    public function save(array $parameters):void{
        Post::create([
            "categoria_id" => $parameters["categoria_id"],
            "user_id" => $parameters["user_id"],
            "titulo" => $parameters["titulo"],
            "descripcion" => $parameters["descripcion"],
            "estado_convocatoria_id" => $parameters["estado_convocatoria_id"],
            "activo" => $parameters["activo"]
        ]);
    }

    public function getAll() : Collection{
        return Post::get();
    }
}