<?php
namespace App\Services;

use Illuminate\Pagination\Paginator;
use App\Repositories\Posts\PostsRepository;
use App\Repositories\BeneficiosPost\BeneficioPostRepository;
use App\Repositories\RequisitosPost\RequisitosPostRepository;
use App\Repositories\Postulaciones\PostulacionesRepository;

class PostsService{
    private $postsRepository,$beneficioPostRepository,$requisitosPostRepository,$postulacionesRepository;

    public function __construct(){
        $this->postsRepository = resolve(PostsRepository::class);
        $this->beneficioPostRepository = resolve(BeneficioPostRepository::class);
        $this->requisitosPostRepository = resolve(RequisitosPostRepository::class);
        $this->postulacionesRepository = resolve(PostulacionesRepository::class);
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

    public function postular(array $parameters){
        $this->postulacionesRepository->save($parameters);
    }
}