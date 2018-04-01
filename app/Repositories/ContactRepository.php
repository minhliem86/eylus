<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Contact;

class ContactRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Contact::class;
    }
    // END

}