<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\CategoriaPost\CategoriaPostRepository;

class CategoriaPostService{
    private $categoriaPostRepository;

    public function __construct(){
        $this->categoriaPostRepository = resolve(CategoriaPostRepository::class);
    }   
    
    public function save(array $parameters) : void{
        $this->categoriaPostRepository->save($parameters);
    }

    public function getAll() : Collection{
        return $this->categoriaPostRepository->getAll();
    }
    
}