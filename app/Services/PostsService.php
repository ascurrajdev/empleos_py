<?php
namespace App\Services;

use App\Repositories\Posts\PostsRepository;
use App\Repositories\BeneficiosPost\BeneficioPostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostsService{
    private $postsRepository,$beneficioPostRepository;

    public function __construct(){
        $this->postsRepository = resolve(PostsRepository::class);
        $this->beneficioPostRepository = resolve(BeneficioPostRepository::class);
    }

    public function save(array $parameters){
        $post = $this->postsRepository->save($parameters);
        $this->beneficioPostRepository->save([
            "beneficio" => $parameters["beneficio"],
            "post_id" => $post->id
        ]);
    }

    public function getAll() : Collection{
        return $this->postsRepository->getAll();
    }
}