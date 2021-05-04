<?php
namespace App\Repositories\CategoriaPost;

use App\Models\CategoriaPost;

class CategoriaPostRepositoryImp implements CategoriaPostRepository{

    public function save(array $parameters) : void{
        CategoriaPost::create([
            "categoria" => $parameters["categoria"],
        ]);
    }

}