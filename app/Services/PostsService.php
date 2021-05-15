<?php
namespace App\Services;

use Illuminate\Pagination\Paginator;
use App\Repositories\Posts\PostsRepository;
use App\Repositories\BeneficiosPost\BeneficioPostRepository;
use App\Repositories\RequisitosPost\RequisitosPostRepository;

class PostsService{
    private $postsRepository,$beneficioPostRepository,$requisitosPostRepository;

    public function __construct(){
        $this->postsRepository = resolve(PostsRepository::class);
        $this->beneficioPostRepository = resolve(BeneficioPostRepository::class);
        $this->requisitosPostRepository = resolve(RequisitosPostRepository::class);
    }

    public function save(array $parameters){
        $post = $this->postsRepository->save($parameters);
        $this->beneficioPostRepository->save([
            "beneficio" => $parameters["beneficio"],
            "post_id" => $post->id
        ]);
        $this->requisitosPostRepository->save([
            "requisito" => $parameters["requisito"],
            "post_id" => $post->id
        ]);
    }

    public function getAll() : Paginator{
        return $this->postsRepository->getAll();
    }
}