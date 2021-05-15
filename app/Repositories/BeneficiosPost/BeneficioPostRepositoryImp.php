<?php
namespace App\Repositories\BeneficiosPost;
use App\Models\BeneficiosPost;
use Illuminate\Database\Eloquent\Model;

class BeneficioPostRepositoryImp implements BeneficioPostRepository{
    
    public function save(array $parameters) : Model{
        return BeneficiosPost::create([
            "beneficio" => $parameters["beneficio"],
            "post_id" => $parameters["post_id"]
        ]);
    }

}