<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\TygiaRepository;

class BrandController extends Controller
{
    protected $brand;
    protected $tygia;

    public function __construct(BrandRepository $brand, TygiaRepository $tygia)
    {
        $this->brand = $brand;
        $this->tygia = $tygia->query('value')->first()->value;
    }

    public function getBrand($slug)
    {
        $brand = $this->brand->findByField('slug', $slug,['id','name_vi', 'name_en'],['products'])->first();
        return view('Client::pages.brand.index', compact('brand'))->with('tygia',$this->tygia);
    }
}
