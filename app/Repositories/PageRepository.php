<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Page;

class PageRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Page::class;
    }

    public function getRelate($not_id,$column= ['*'])
    {
        return $this->model->where('type','other')->whereNotIn('id',[$not_id])->inRandomOrder()->limit(5)->get($column);
    }
    // END
}