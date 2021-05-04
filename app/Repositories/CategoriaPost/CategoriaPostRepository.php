<?php
namespace App\Repositories\CategoriaPost;
interface CategoriaPostRepository{
    public function save(array $parameters) : void;
}