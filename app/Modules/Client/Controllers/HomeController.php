<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\VideoRepository;

class HomeController extends Controller
{
    protected $product;
    protected $video;

    public function __construct(ProductRepository $product, VideoRepository $video)
    {
        $this->product = $product;
        $this->video = $news;
    }

    public function index()
    {

        $feature_p = $this->product->getFeatureProduct(['id', 'img_url', 'name_vi','slug', 'price_vi', 'name_en']);
        $promotion_p = $this->product->getPromotionProduct(['id', 'img_url', 'name_vi','slug', 'price_vi', 'name_en']);
        $fav_p = $this->product->getBestProduct(['id', 'img_url', 'name_vi','slug', 'price_vi', 'name_en']);
        $videos = $this->product->findByField('status',1, ['video_url'])->get();
        return view('Client::pages.home.index', compact('feature_p'));
    }
}
