<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\EmailSubscribe;

class EmailSubscribeRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return EmailSubscribe::class;
    }
    // END

}