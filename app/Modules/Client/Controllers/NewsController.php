<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Repositories\PromotionRepository;

class NewsController extends Controller
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
        $news = $this->news->findByField('status',1, ['id', 'title_vi','title_en' ,'slug', 'content_vi','content_en', 'img_url'])->get();
        $promotions = $this->promotion->query(['slug', 'title_vi', 'title_en', 'slug', 'content_vi','content_en', 'img_url'])->inRandomOrder()->limit(5)->get();
        return view('Client::pages.news.index', compact('news', 'promotions'));
    }


    public function getDetail($slug)
    {

        $news = $this->news->findByField('slug', $slug, ['id', 'title_vi','title_en', 'slug', 'content_vi','content_en', 'created_at'])->first();
        $promotions = $this->promotion->query(['slug', 'title_vi', 'title_en', 'slug', 'content_vi','content_en', 'img_url'])->inRandomOrder()->limit(5)->get();
        $metas = $news->metas()->first();
        if(count($news)){
            $relate_news = $this->news->getRelate([$news->id], ['id', 'title_vi','title_en', 'slug', 'content_vi','content_en','img_url']);
            return view('Client::pages.news.detail', compact('news', 'relate_news', 'metas', 'promotions'));
        }
        return response()->view('Admin::errors.404','',404);
    }
}
