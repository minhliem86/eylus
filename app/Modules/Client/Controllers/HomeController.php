<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\VideoRepository;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Validator;
use DB;

class HomeController extends Controller
{
    protected $product;
    protected $video;

    public function __construct(ProductRepository $product, VideoRepository $video)
    {
        $this->product = $product;
        $this->video = $video;
    }

    public function index()
    {
        $feature_p = $this->product->getFeatureProduct(['id', 'img_url', 'name_vi','name_en','slug', 'price_vi' , 'price_en', 'name_en']);
        $promotion_p = $this->product->getPromotionProduct(['id', 'img_url', 'name_vi','name_en','slug', 'price_vi' , 'price_en', 'name_en']);
        $fav_p = $this->product->getBestProduct(['id', 'img_url', 'name_vi','name_en','slug', 'price_vi' , 'price_en', 'name_en']);
        $videos = $this->video->findByField('status',1, ['video_url'])->get();
        return view('Client::pages.home.index', compact('feature_p','promotion_p','fav_p','videos'));
    }

    public function postSearch(Request $request)
    {
        $valid = Validator::make($request->all(), ['search-key' => 'required'], ['search-key.required' => 'Vui lòng nhập từ khóa tìm kiếm.']);
        if($valid->fails()){
            return back()->withErrors($valid, 'search');
        }
        $keyword = $request->input('search-key');
        $product = DB::table('products')->where(trans('variable.name'),'LIKE','%'.$keyword.'%')->get();
        return view('Client::pages.extension.search', compact('keyword','product'));
    }
}
