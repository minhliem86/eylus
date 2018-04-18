<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function getCategory($slug)
    {
        $cate = $this->category->findByField('slug', $slug)->paginate(15);
        return view('Client::pages.category.index', compact('cate'));
    }
}
