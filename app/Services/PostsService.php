<?php
namespace App\Services;

use App\Repositories\Posts\PostsRepository;

class PostsService{
    private $postsRepository;

    public function __construct(){
        $this->postsRepository = resolve(PostsRepository::class);
    }

    public function save(array $parameters){
        
    }
}