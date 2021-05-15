<?php
namespace App\Repositories\BeneficiosPost;

use Illuminate\Database\Eloquent\Model;

interface BeneficioPostRepository{
    public function save(array $parameters) : Model;
}