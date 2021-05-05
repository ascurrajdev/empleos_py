<?php
namespace App\Repositories\CategoriaPost;

use Illuminate\Database\Eloquent\Collection;

interface CategoriaPostRepository{
    public function save(array $parameters) : void;
    public function getAll(): Collection;
}