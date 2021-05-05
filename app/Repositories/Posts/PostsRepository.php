<?php
namespace App\Repositories\Posts;

use Illuminate\Database\Eloquent\Collection;

interface PostsRepository{
    public function save(array $parameters):void;
    public function getAll():Collection;
}