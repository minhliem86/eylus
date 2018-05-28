<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PromotionCodeRepository;
use App\Repositories\OrderRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\TygiaRepository;

use Mcamara\LaravelLocalization\LaravelLocalization;
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
    protected $tygia;

    public function __construct(CategoryRepository $category, ProductRepository $product, PromotionCodeRepository $promotion, OrderRepository $order, TransactionRepository $transaction, TygiaRepository $tygia)
    {
        $this->product = $product;
        $this->promotion = $promotion;
        $this->category = $category;
        $this->order = $order;
        $this->transaction = $transaction;
        $this->tygia = $tygia->query('value')->first()->value;
        $this->auth = Auth::guard('customer');
    }

    protected function _validateAddToCart()
    {
        return [
            'quantity' => 'required|min:1',
        ];
    }

    protected function _createOtherCustomer()
    {
        $data = [
            'name' => 'Khách vãng lai',
            'email' => 'khachvanglai@admin.com',
            'phone' => '0123456789',
            'username' => 'khachvanglai',
            'password' => bcrypt('123456')
        ];
        $customer = DB::table('customers')->insertGetId($data);
        return $customer->id;
    }

    protected function _rulesPayment()
    {
        return [
            'fullname' => 'required',
            'phone' => 'required|digits_between:5,11',
            'email' => 'required|email',
            'address' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'ship_cost' => 'required',
            'payment_method' => 'required'
        ];
    }

    protected function _messagePayment()
    {
        return [
            'fullname.required' => trans('payment.validate_name'),
            'phone.required' => trans('payment.validate_phone'),
            'phone.digits_between' => trans('payment.validate_phone_digist'),
            'email.required' => trans('payment.validate_email'),
            'address.required' => trans('payment.validate_address'),
            'city.required' => trans('payment.validate_city'),
            'district.required' => trans('payment.validate_district'),
            'ward.required' => trans('payment.validate_ward'),
        ];
    }

    protected function _setUpNL()
    {
        $nl = new \NL_Checkout();
        $nl->nganluong_url = env('NL_URL');
        $nl->merchant_site_code = env('MERCHANT_CODE');
        $nl->secure_pass = env('SECURSE_PASS');
        return $nl;
    }



    public function getIndex()
    {
        $product = $this->product->query(['id', 'name_vi', 'name_en', 'price_vi', 'price_en', 'img_url', 'slug'])->where('status',1)->paginate(15);
        return view('Client::pages.product.index', compact('product'))->with(['tygia' => $this->tygia]);
    }

    public function getProduct($slug)
    {
        $product = $this->product->findByField('slug', $slug,['*'], ['photos', 'brands'])->first();
        return view('Client::pages.product.detail', compact('product'))->with(['tygia' => $this->tygia]);
    }

    public function addToCart(Request $request)
    {
        $valid = Validator::make($request->all(),$this->_validateAddToCart(), ['quantity.required' => trans('product_valid.quantity_required'), 'quantity.min' => trans('product_valid.quantity_min')]);
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
                'name' => \LaravelLocalization::getCurrentLocale() == 'en' ? $product->name_en : $product->name_vi,
                'price' => $product->price_vi,
                'quantity' => $request->input('quantity'),
                'attributes' => $att,
            ];
            Cart::add($data);
            return redirect()->back()->with(['success'=>trans('product_valid.product_added'), 'data' => $product, 'attribute' => $att ]);
        }else{
            return redirect()->back()->withInput()->with('errors',trans("product_valid.product_notavai"));
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
                'name' => \LaravelLocalization::getCurrentLocale() == 'en' ? $product->name_en : $product->name_vi,
                'price' => $product->price_vi,
                'quantity' => 1,
                'attributes' =>$att
            ]);
            $cart_header =  view('Client::ajax.cart_header')->render();
            return response()->json(['error' => false, 'cart_header' => $cart_header, 'message' => trans('static.addToCart')]);
        }
    }

    /*CART*/
    public function getCart()
    {
        if(Cart::isEmpty()){
            return redirect()->route('client.product.index')->with('error',trans('product_valid.cart_empty'));
        }
        return view('Client::pages.cart.cart')->with(['tygia' => $this->tygia]);
    }

    public function updateQuantity(Request $request)
    {
        if(count($request->input('quantity'))){
            foreach($request->input('quantity') as $k=>$v){
                Cart::update($k,['quantity'=>['relative' => false,
                    'value' => $v]]);
            }
            return back()->with('success',trans('product_valid.cart_update'));
        }
    }

    public function removeItemCart(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else {
            Cart::remove($request->input('cart_id'));
            $view = view('Client::ajax.cart')->render();
            $cart_header =  view('Client::ajax.cart_header')->render();
            return response()->json(['error' => false, 'data'=>$view, 'cart_header' => $cart_header]);
        }
    }

    /*PAYMENT*/
    public function getPayment()
    {
        Cart::removeConditionsByType('shipping');
        if(Cart::isEmpty()){
            return redirect()->route('client.home')->with('error',trans('product_valid.cart_empty'));
        }
        if($this->auth->check()){
            $user = $this->auth->user();
        }else{
            $user = null;
        }
        $shippingCost = DB::table('ship_costs')->get();
        $city = DB::table('cities')->lists('name_with_type', 'code');
        $payment = DB::table('payment_methods')->get();;
        return view('Client::pages.cart.payment', compact( 'payment', 'city', 'user', 'shippingCost'))->with(['tygia'=>$this->tygia]);
    }

    public function applyPromotion(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $promotion_valid = Cart::getConditionsByType('discount');
            if($promotion_valid->isEmpty()){
                $promote_code = $request->input('pr_code');
                $pr = $this->promotion->query()->where('sku_promotion',$promote_code)->where('status',1)->select('name','sku_promotion', 'num_use','target','value', 'value_type')->first();
                if(isset($pr)){
                    if(Cart::getCondition($pr->sku_promotion)){
                        return response()->json(['error'=>true, 'data'=> null, 'message' => trans('product_valid.promotion_exists')], 200);
                    }else{
                        $cond = new \Darryldecode\Cart\CartCondition(
                            [
                                'name' => $pr->sku_promotion,
                                'type' => 'discount',
                                'target' => $pr->target,
                                'value' => $pr->value_type === '%' ? $pr->value.$pr->value_type : $pr->value,
                            ]
                        );
                        Cart::condition($cond);
                        $view = view('Client::ajax.cart_payment')->render();
                        $view_promotion = view('Client::ajax.promotion_apply')->render();
                        return response()->json(['error' => false, 'view' => $view, 'view_promoition'=> $view_promotion, 'message' => 'Mã khuyến mãi đã được áp dụng'], 200);
                    }
                }else{
                    return response()->json(['error'=>true, 'data'=> null, 'message' => trans('product_valid.promotion_expire')], 200);
                }
            }else{
                return response()->json(['error'=>true, 'data'=> null, 'message' => trans('product_valid.promotion_exists')], 200);
            }
        }
    }

    public function doPayment(Request $request)
    {
        if(!$this->auth->check()){
            $other_customer = DB::table('customers')->where('email','khachvanglai@admin.com')->select('id')->first();
            if(isset($other_customer)){
                $customer_id = $other_customer->id;
            }else{
                $customer_id =$this->_createOtherCustomer();
            }
        }else{
            $customer_id = $this->auth->user()->id;
        }
        $valid = Validator::make($request->all(), $this->_rulesPayment(), $this->_messagePayment());
        if($valid->fails()){
            return back()->withInput()->withErrors($valid->errors());
        }

        /*** ADD SHIPPING COST ***/
        $ship_cost = DB::table('ship_costs')->select('id','price_vi')->find($request->input('ship_cost'));
        $ship_cond = new \Darryldecode\Cart\CartCondition(
            [
                'name' => 'Shipping Cost',
                'type' => 'shipping',
                'target' => 'subtotal',
                'value' => $ship_cost->price_vi,
            ]
        );
        Cart::condition($ship_cond);
        /** END **/

        /** GET PROMOTION */
        if(!Cart::getConditionsByType('discount')->isEmpty()){
            $condition_ship = Cart::getConditionsByType('discount')->first();
            $subTotal = Cart::getSubTotal();
            $conditionCalculatedValue = $condition_ship->getCalculatedValue($subTotal);

            $promotion_sku = $condition_ship->getName();
            $promotion = $this->promotion->findByField('sku_promotion', $promotion_sku)->first();
            if(isset($promotion)){
                $promotion->quantity = $promotion->quantity - 1;
                $promotion->save();
            }
            $promotion_id = $promotion->id;
        }else{
            $promotion_id = null;
        }
        /** @var  END */

        $payment_method = DB::table('payment_methods')->select('id','slug')->find($request->input('payment_method'))->slug;

        switch ($payment_method){
            case 'cod' :
                /*LUU GIO HANG*/
                $order_name = \LP_lib::unicodenospace($request->input('fullname')).'_'.time();
                $data = [
                    'name' => $order_name,
                    'shipcost_id' => $ship_cost->id,
                    'total' => Cart::getTotal(),
                    'customer_id' => $customer_id,
                    'promotion_id' => $promotion_id,
                    'paymentmethod_id' => $request->input('payment_method'),
                    'shipstatus_id' => 1,
                    'paymentstatus_id' =>1,
                ];
                $current_order = $this->order->create($data);

                /*LUU SHIP ADDRESS*/
                $data_ship = [
                    'fullname' => $request->fullname,
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'city' => $request->input('city_id'),
                    'district' => $request->input('district_id'),
                    'address' => $request->input('address'),
                    'note' => $request->input('note'),
                    'order_id' => $current_order->id,
                ];
                DB::table('ship_addresses')->insert($data_ship);

                /*LUU GIO HANG CHI TIET*/
                $cart = Cart::getContent();
                foreach($cart as $item){
                    $product = $this->product->find($item->id);
                    $product->quantity = $product->quantity - 1;
                    $product->save();

                    $current_order->products()->attach($item->id, [
                        'quantity'=>$item->quantity,
                        'unit_price'=>$product->price_vi,
                    ]);
                }

//                event(new SendMail($cart, $customer_id));

                Cart::clearCartConditions();
                Cart::clear();

                return redirect()->route('client.payment_success.thank')->with('success',trans('product_valid.order_success'));
                break;

            case 'ngan-luong' :
                $order_name = \LP_lib::unicodenospace($request->input('fullname')).'_'.time();

                $data = [
                    'name' => $order_name,
                    'shipcost_id' => $ship_cost->id,
                    'total' => Cart::getTotal(),
                    'customer_id' => $customer_id,
                    'promotion_id' => $promotion_id,
                    'paymentmethod_id' => $request->input('payment_method'),
                    'shipstatus_id' => 1,
                    'paymentstatus_id' =>1,
                ];
                $current_order = $this->order->create($data);

                $data_ship = [
                    'fullname' => $request->fullname,
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'city' => $request->input('city_id'),
                    'district' => $request->input('district_id'),
                    'address' => $request->input('address'),
                    'note' => $request->input('note'),
                ];

                $data_ship = [
                    'fullname' => $request->fullname,
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'city' => $request->input('city_id'),
                    'district' => $request->input('district_id'),
                    'address' => $request->input('address'),
                    'note' => $request->input('note'),
                    'order_id' => $current_order->id,
                ];
                DB::table('ship_addresses')->insert($data_ship);

                $refer = $this->_setUpNL()->buildCheckoutUrlExpand(
                    $return_url = route('client.payment.checkpay'),
                    $receiver = 'minhliemphp@gmail.com',
                    $transaction_info = $current_order->id,
                    $order_code = $order_name,
                    $price = Cart::getSubTotal(),
                    $currency = 'vnd',
                    $quantity = 1,
                    $tax = 0,
                    $discount = $conditionCalculatedValue ? $conditionCalculatedValue : 0,
                    $fee_cal = 0,
                    $fee_shipping = $ship_cost->price_vi,
                    $order_description = 'Đơn hàng của khách hàng: '. $request->fullname,
                    $buyer_info = $request->fullname.' *|* '.$request->email. ' *|* '.$request->phone. ' *|* '.$request->address .' '. DB::table('districts')->where('code',$request->district_id)->first()->name .' '. DB::table('cities')->where('code',$request->city_id)->first()->name,
                    $affiliate_code = ''
                );
                return redirect($refer);
                break;

            default :
                return back()->with('error','Phương thức thanh toán không tồn tại.');
        }
    }

    public function getCheckPay(Request $request)
    {
        $transaction_info = $request->input('transaction_info');
        $order_code = $request->input('order_code');
        $price =$request->input('price');
        $payment_id =$request->input('payment_id');
        $payment_type =$request->input('payment_type');
        $error_text =$request->input('error_text');
        $secure_code =$request->input('secure_code');

        $checkresponse =  $this->_setUpNL()->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
        if($checkresponse){
            $this->order->update(['paymentstatus_id'=>2],$transaction_info);
            $this->transaction->create(
                [
                    'order_id' => $request->input('transaction_info'),
                    'order_name' =>$order_code,
                    'transaction_id' => $payment_id,
                    'total' => $price
                ]
            );

            Cart::clearCartConditions();
            Cart::clear();

            return redirect()->route('client.payment_success.thank')->with('success',trans('product_valid.order_success'));
        }else{
            return redirect()->route('client.payment.index')->with('error', trans('product_valid.order_fails'));
        }
    }

    public function getThankyou(){
        if(session('success')){
            return view('Client::pages.cart.payment_success');
        }
        return redirect()->route('client.home');
    }

    public function getDistrict(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $city_id = $request->input('city_id');
            $district = DB::table('districts')->where('parent_code', $city_id)->lists('name_with_type', 'code');
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
