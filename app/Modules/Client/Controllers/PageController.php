<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;

class PageController extends Controller
{
    protected $page;

    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    public function listFooter()
    {

    }

    public function getPage($slug)
    {
        $page = $this->page->findByField('slug', $slug, ['id','name_vi', 'name_en', 'content_vi', 'content_en'])->first();
        if(count($page)){
            $page_relate = $this->page->getRelate($page->id, ['name_vi', 'name_en', 'content_vi', 'content_en']);
            return view('Client::pages.single.index', compact('page', 'page_relate'));
        }
    }
}
