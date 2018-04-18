<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Promotion;

class PromotionRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Promotion::class;
    }

    public function getRelate($not_id,$column= ['*'])
    {
        return $this->model->where('status',1)->whereNotIn('id',[$not_id])->inRandomOrder()->limit(5)->get($column);
    }
    // END

}