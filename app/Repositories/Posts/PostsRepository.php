<?php
namespace App\Repositories\Posts;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

interface PostsRepository{
    public function save(array $parameters):Model;
    public function getAll():Paginator;
}