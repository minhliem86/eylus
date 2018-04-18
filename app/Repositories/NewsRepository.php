<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\News;

class NewsRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return News::class;
    }

    public function getRelate($not_id,$column= ['*'])
    {
        return $this->model->where('status',1)->whereNotIn('id',[$not_id])->inRandomOrder()->limit(5)->get($column);
    }
    // END

}