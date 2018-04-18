<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Repositories\PromotionRepository;

class PromotionController extends Controller
{
    protected $news;
    protected $promotion;

    public function __construct(NewsRepository $news, PromotionRepository $promotion)
    {
        $this->news = $news;
        $this->promotion = $promotion;
    }

    public function getIndex()
    {
        $promotions = $this->promotion->findByField('status',1, ['id', 'title_vi','title_en' ,'slug', 'content_vi','content_en', 'img_url'])->get();
        $news = $this->news->query(['slug', 'title_vi', 'title_en', 'slug', 'content_vi','content_en', 'img_url'])->inRandomOrder()->limit(5)->get();
        return view('Client::pages.promotion.index', compact('news', 'promotions'));
    }


    public function getDetail($slug)
    {

        $promotions = $this->promotion->findByField('slug', $slug, ['id', 'title_vi','title_en', 'slug', 'content_vi','content_en', 'created_at'])->first();
        $news = $this->news->query(['slug', 'title_vi', 'title_en', 'slug', 'content_vi','content_en', 'img_url'])->inRandomOrder()->limit(5)->get();
        $metas = $promotions->metas()->first();
        if(count($promotions)){
            $relate_promotions = $this->promotion->getRelate([$promotions->id], ['id', 'title_vi','title_en', 'slug', 'content_vi','content_en','img_url']);
            return view('Client::pages.promotion.detail', compact('news', 'relate_promotions', 'metas', 'promotions'));
        }
        return response()->view('Admin::errors.404','',404);
    }
}
