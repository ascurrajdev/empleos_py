<?php
namespace App\Repositories\Posts;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface PostsRepository{
    public function save(array $parameters):Model;
    public function getAll():Paginator;
    public function getAllFromUser($user):Collection;
}