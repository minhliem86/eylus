<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PromotionRepository;
//use App\Repositories\PaymentMethodRepository;
use App\Repositories\OrderRepository;
use App\Repositories\TransactionRepository;

use Validator;
use Cart;
use Auth;
use Session;

use DB;
use Carbon\Carbon;


class ProductController extends Controller
{
    protected $product;
    protected $category;
    protected $promotion;
    protected $order;
    protected $transaction;

    protected function _validateAddToCart()
    {
        return [
          'quantity' => 'required|min:1',
        ];
    }


    public function __construct(CategoryRepository $category, ProductRepository $product, PromotionRepository $promotion, OrderRepository $order, TransactionRepository $transaction)
    {
        $this->product = $product;
        $this->promotion = $promotion;
        $this->category = $category;
        $this->order = $order;
        $this->transaction = $transaction;
    }

    public function getIndex()
    {
        $product = $this->product->query(['id', 'name_vi', 'name_en', 'price_vi', 'price_en', 'img_url', 'slug'])->where('status',1)->paginate(15);
        return view('Client::pages.product.index', compact('product'));
    }

    public function getProduct($slug)
    {
        $product = $this->product->findByField('slug', $slug,['*'], ['photos', 'brands'])->first();
        return view('Client::pages.product.detail', compact('product'));
    }

    public function addToCart(Request $request)
    {
        $valid = Validator::make($request->all(),$this->_validateAddToCart(), ['quantity.required' => 'Vui lòng chọn số lượng sản phẩn cần mua.', 'quantity.min' => 'Số lượng tối thiểu là 1.']);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid);
        }
        $id = $request->input('product_id');
        $product = $this->product->find($id, ['id', 'name_vi','name_en','price_vi','price_en', 'img_url']);
        if(count($product)){
            $att = [
                'img_url' => $product->img_url,
            ];
            $data = [
                'id' => $product->id,
                'name' => $product->name_vi,
                'price' => $product->price_vi,
                'quantity' => $request->input('quantity'),
                'attributes' => $att,
            ];
            Cart::add($data);
            return redirect()->back()->with(['success'=>'Sản Phẩm đã được thêm vào giỏ hàng', 'data' => $product, 'attribute' => $att ]);
        }else{
            return redirect()->back()->withInput()->with('errors','Sản Phẩm không tồn tại.');
        }
    }

    public function addToCartAjax(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $id = $request->input('id');
            $product = $this->product->find($id, ['id', 'name_vi','name_en','price_vi','price_en', 'img_url']);
            $att = [
                'img_url' => $product->img_url,
            ];
            $itemCart = Cart::add([
                'id'=>$id,
                'name' => $product->name_vi,
                'price' => $product->price_vi,
                'quantity' => 1,
                'attributes' =>$att
            ]);
            $quantityCart = Cart::getTotalQuantity();
            return response()->json(['error' => false, 'data'=> $quantityCart]);
        }
    }

    /*CART*/
    public function getCart()
    {
        if(Cart::isEmpty()){
            return redirect()->route('client.product.showAll')->with('error','Giỏ hàng của bạn đang rỗng. Vui lòng chọn sản phẩm.');
        }
        return view('Client::pages.cart.cart', compact('cart'));
    }

    public function updateQuantityAjax(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $id = $request->input('id');
            $quantity = $request->input('quantity');
            if($quantity <= 0){
                return response()->json(['error' => true, 'data' => 'Số lượng phải lớn hơn 0.']);
            }else {
                Cart::update($id,['quantity'=>['relative'=>false, 'value' => $quantity]]);
                $subTotal = Cart::getSubTotal();
                return response()->json(['error' => false, 'data'=>number_format($subTotal)]);
            }
        }
    }

    public function clearCart()
    {
        Cart::clear();
        Cart::clearCartConditions();
        return redirect()->route('client.product.index')->with('error','Giỏ hàng của bạn đã được xóa.');;
    }

    public function removeItemCart(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else {
            Cart::remove($request->input('id'));
            $subTotal = Cart::getSubTotal();
            return response()->json(['error' => false, 'data'=>number_format($subTotal)]);
        }
    }

    /*PAYMENT*/
    public function getPayment(Request $request, PaymentMethodRepository $paymentMethod)
    {
        if(Cart::isEmpty()){
            return redirect()->route('client.home')->with('error','Giỏ hàng của bạn đang rỗng. Vui lòng chọn sản phẩm.');
        }
        $cart = Cart::getContent();
        $city = DB::table('cities')->lists('name_with_type', 'code');
        $pm = DB::table('payment_methods')->lists('name_vi', 'id');
        return view('Client::pages.product.payment', compact('cart', 'pm', 'city'));
    }

    public function getDistrict(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $city_id = $request->input('city_id');
            $district = DB::table('district')->where('parent_code', $city_id)->lists('name_with_type', 'code');
            $view = view('Client::ajax.district', compact('district'))->render();
            return response()->json(['error' => false, 'data'=> $view]);
        }
    }
    public function getWard(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $district_id = $request->input('district_id');
            $ward = DB::table('wards')->where('parent_code', $district_id)->lists('name_with_type', 'code');
            $view = view('Client::ajax.ward', compact('ward'))->render();
            return response()->json(['error' => false, 'data'=> $view]);
        }
    }
}
