<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\PromotionCode;

class PromotionCodeRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return PromotionCode::class;
    }
    // END

}