<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\VideoRepository;
use App\Repositories\TygiaRepository;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Validator;
use DB;

class HomeController extends Controller
{
    protected $product;
    protected $video;
    protected $tygia;

    public function __construct(ProductRepository $product, VideoRepository $video, TygiaRepository $tygia)
    {
        $this->product = $product;
        $this->tygia = $tygia->query('value')->first()->value;
        $this->video = $video;
    }

    public function index()
    {
        $feature_p = $this->product->getFeatureProduct(['id', 'thumb_img_url', 'name_vi','name_en','slug', 'price_vi' , 'price_en', 'name_en']);
        $promotion_p = $this->product->getPromotionProduct(['id', 'thumb_img_url', 'name_vi','name_en','slug', 'price_vi' , 'price_en', 'name_en']);
        $fav_p = $this->product->getBestProduct(['id', 'thumb_img_url', 'name_vi','name_en','slug', 'price_vi' , 'price_en', 'name_en']);
        $videos = $this->video->findByField('status',1, ['video_url'])->get();
        return view('Client::pages.home.index', compact('feature_p','promotion_p','fav_p','videos'))->with('tygia',$this->tygia);
    }

    public function postSearch(Request $request)
    {
        $valid = Validator::make($request->all(), ['search-key' => 'required'], ['search-key.required' => 'Vui lòng nhập từ khóa tìm kiếm.']);
        if($valid->fails()){
            return back()->withErrors($valid, 'search');
        }
        $keyword = $request->input('search-key');
        $product = DB::table('products')->where(trans('variable.name'),'LIKE','%'.$keyword.'%')->get();
        return view('Client::pages.extension.search', compact('keyword','product'))->with('tygia',$this->tygia);
    }
}
