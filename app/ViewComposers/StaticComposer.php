<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\PageRepository;
class StaticComposer{

    protected $page;
    public function __construct(PageRepository $page)
    {
        // TODO: integrate instance
        $this->page = $page;
    }

    public function compose(View $view)
    {
        // TODO: Bind data to view
        $static_page = $this->page->query(['id','name_vi', 'name_en', 'slug'])->where('type','static')->first();
        $other_page = $this->page->query(['id','name_vi', 'name_en', "slug"])->where('type','other')->get();
        $view->with(compact('static_page', 'other_page'));
    }
}