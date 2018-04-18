<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\BrandRepository;
class BrandComposer{

    protected $brand;
    public function __construct(BrandRepository $brand)
    {
        // TODO: integrate instance
        $this->brand = $brand;
    }

    public function compose(View $view)
    {
        // TODO: Bind data to view
        $brands = $this->brand->all(['id','slug','name_vi','name_en']);
        $view->with(compact('brands'));
    }
}