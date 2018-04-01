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
    // END

}