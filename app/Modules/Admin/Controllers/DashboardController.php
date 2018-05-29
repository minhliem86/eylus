<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use developeruz\Analytics\Period;
use developeruz\Analytics\Analytics;
use Carbon\Carbon;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\ContactRepository;
use App\Repositories\NewsRepository;
use App\Repositories\VideoRepository;
use App\Repositories\PromotionCodeRepository;

class DashboardController extends Controller
{
    protected $analytic;
    protected $product;
    protected $contact;
    protected $customer;
    protected $category;
    protected $brand;
    protected $news;
    protected $video;
    protected $promotioncode;

    public function __construct(Analytics $analytic, ProductRepository $product, ContactRepository $contact, CustomerRepository $customer, CategoryRepository $category, BrandRepository $brand, NewsRepository $news, VideoRepository $video, PromotionCodeRepository $promotioncode )
    {
        $this->analytic = $analytic;
        $this->product = $product;
        $this->contact = $contact;
        $this->customer = $customer;
        $this->category = $category;
        $this->brand = $brand;
        $this->news = $news;
        $this->video = $video;
        $this->promotioncode = $promotioncode;

    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->has('week')) {
                $ga = $this->analytic->fetchTotalVisitorsAndPageViews(Period::days(7));
            } else {
                $from = $request->input('from');
                $to = $request->input('to');

                $start_d = Carbon::createFromFormat('d-m-Y', $from);
                $to_d = Carbon::createFromFormat('d-m-Y', $to);
                $date = Period::create($start_d, $to_d);
                $ga = $this->analytic->fetchTotalVisitorsAndPageViews($date);
            }

            foreach ($ga as $item) {

                $arrDate[] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['date'])->toDateString();
                $arrVisitor[] = $item['visitors'];
                $arrPageview[] = $item['pageViews'];
            }
            return view('Admin::ajax.ajaxChart')->with(['j_date' => json_encode($arrDate), 'j_visitor' => json_encode($arrVisitor), 'j_pageview' => json_encode($arrPageview)])->render();
        } else {
            $ga = $this->analytic->fetchTotalVisitorsAndPageViews(Period::days(7));
        }
        foreach ($ga as $item) {

            $arrDate[] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['date'])->toDateString();
            $arrVisitor[] = $item['visitors'];
            $arrPageview[] = $item['pageViews'];
        }

        $number_product = $this->product->query()->count();
        $number_category = $this->category->query()->count();
        $number_brand = $this->brand->query()->count();
        $number_user = $this->customer->query()->count();
        $number_news = $this->news->query()->count();
        $number_video = $this->video->query()->count();
        $new_user = $this->_getNewCustomer();
        foreach ($this->_getPromotionStatus() as $key => $value)
        {
            $pro_active_chart[] = $value['active'];
            $pro_deactive_chart[] = $value['deactive'];
        }

        return view('Admin::pages.dashboard.index', compact('number_product', 'number_category', 'number_brand', 'number_user', 'number_news', 'number_video', 'new_user'))->with(['j_date' => json_encode($arrDate), 'j_visitor' => json_encode($arrVisitor), 'j_pageview' => json_encode($arrPageview), 'j_promotion_active' => json_encode($pro_active_chart), 'j_promotion_deactive' => json_encode($pro_deactive_chart)]);
    }

    protected function _getNewCustomer()
    {
        $new_user = $this->customer->query(['id','name','username','phone','created_at'])->orderBy('id', 'DESC')->paginate(5);
    }

    protected function _getPromotionStatus()
    {
        $arrMonth = [];
        for ($i = 1; $i <= 12; $i++){
            $promotion_active = $this->promotioncode->query()->whereMonth('created_at','=',$i)->where('status',1)->count();
            $promotion_deactive = $this->promotioncode->query()->whereMonth('created_at','=',$i)->where('status',0)->count();
            $arrMonth['T'.$i] = [
                'active' => $promotion_active,
                'deactive' => $promotion_deactive,
            ];
        }
        return $arrMonth;

    }

}
