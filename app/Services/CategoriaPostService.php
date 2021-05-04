<?php
namespace App\Services;

use App\Repositories\CategoriaPost\CategoriaPostRepository;

class CategoriaPostService{
    private $categoriaPostRepository;

    public function __construct(){
        $this->categoriaPostRepository = resolve(CategoriaPostRepository::class);
    }   
    
    public function save(array $parameters) : void{
        $this->categoriaPostRepository->save($parameters);
    }
    
}