<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;

class BrandController extends Controller
{
    protected $brand;

    public function __construct(BrandRepository $brand)
    {
        $this->brand = $brand;
    }

    public function getBrand($slug)
    {
        $brand = $this->brand->findByField('slug', $slug,['id','name_vi', 'name_en'],['products'])->first();
        return view('Client::pages.brand.index', compact('brand'));
    }
}
