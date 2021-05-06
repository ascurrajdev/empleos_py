<?php
namespace App\Repositories\BeneficiosPost;
use App\Models\BeneficioPost;
use Illuminate\Database\Eloquent\Collection;

class BeneficioPostRepositoryImp implements BeneficioPostRepository{
    
    public function save(array $parameters) : Collection{
        return BeneficioPost::create([
            "beneficio" => $parameters["beneficio"],
            "post_id" => $parameters["post_id"]
        ]);
    }

}