<?php
namespace App\Repositories\CategoriaPost;

use App\Models\CategoriaPost;
use Illuminate\Database\Eloquent\Collection;

class CategoriaPostRepositoryImp implements CategoriaPostRepository{

    public function save(array $parameters) : void{
        CategoriaPost::create([
            "categoria" => $parameters["categoria"],
        ]);
    }

    public function getAll() : Collection{
        return CategoriaPost::get(["categoria","id"]);
    }
}