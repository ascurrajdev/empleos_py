<?php
namespace App\Repositories\BeneficiosPost;

use Illuminate\Database\Eloquent\Collection;

interface BeneficioPostRepository{
    public function save(array $parameters) : Collection;
}