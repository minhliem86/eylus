<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Tygia;

class TygiaRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Tygia::class;
    }
    // END

}