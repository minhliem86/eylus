<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\CategoryRepository;
use App\Repositories\VideoRepository;
class ProductSidebarComposer{

    protected $category;
    protected $video;

    public function __construct(CategoryRepository $category, VideoRepository $video)
    {
        // TODO: integrate instance
        $this->category = $category;
        $this->video = $video;
    }

    public function compose(View $view)
    {
        // TODO: Bind data to view
        $categories = $this->category->query(['*'], ['brands'])->where('status',1)->get();
        $videos = $this->video->findByField('status',1)->get();
        $view->with(compact('categories', 'videos'));
    }
}