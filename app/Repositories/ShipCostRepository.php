<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\ShipCost;

class ShipCostRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return ShipCost::class;
    }
    // END

}