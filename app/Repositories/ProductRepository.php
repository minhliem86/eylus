<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Product::class;
    }

    public function getFeatureProduct($column = ['*'],$with = [])
    {
        $query = $this->model->with($with);
        return $query->where('hot',1)->where('status',1)->get($column);
    }

    public function getPromotionProduct($column = ['*'],$with = [])
    {
        $query = $this->model->with($with);
        return $query->where('promotion',1)->where('status',1)->get($column);
    }

    public function getBestProduct($column = ['*'],$with = [])
    {
        $query = $this->model->with($with);
        return $query->orderBy('show_number','DESC')->where('status',1)->limit(3)->get($column);
    }
    // END

}