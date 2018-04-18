<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\CategoryRepository;
class BrandComposer{

    protected $cate;
    public function __construct(CategoryRepository $cate)
    {
        // TODO: integrate instance
        $this->cate = $cate;
    }

    public function compose(View $view)
    {
        // TODO: Bind data to view
        $category = $this->cate->all(['id','slug','name_vi','name_en']);
        $view->with(compact('category'));
    }
}