<?php
namespace App\Repositories\Posts;

use Illuminate\Database\Eloquent\Collection;

interface PostsRepository{
    public function save(array $parameters):Collection;
    public function getAll():Collection;
}