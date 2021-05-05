<?php
namespace App\Services;

use App\Repositories\Posts\PostsRepository;
use Illuminate\Database\Eloquent\Collection;

class PostsService{
    private $postsRepository;

    public function __construct(){
        $this->postsRepository = resolve(PostsRepository::class);
    }

    public function save(array $parameters){
        $this->postsRepository->save($parameters);
    }

    public function getAll() : Collection{
        return $this->postsRepository->getAll();
    }
}