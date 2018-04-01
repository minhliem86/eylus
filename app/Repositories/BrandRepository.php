<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Brand;

class BrandRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Brand::class;
    }
    // END

}