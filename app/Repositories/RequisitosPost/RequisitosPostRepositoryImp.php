<?php
namespace App\Repositories\RequisitosPost;
use App\Models\RequisitosPost;
class RequisitosPostRepositoryImp implements RequisitosPostRepository{

    public function save(array $parameters):void{
        RequisitosPost::create([
            "post_id" => $parameters["post_id"],
            "requisito" => $parameters["requisito"]
        ]);
    }
}