<?php
namespace App\Modules\Admin\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use Carbon\Carbon;

class OrderController extends Controller
{
    protected $order;
    protected $common;
    public function __construct(OrderRepository $order, CommonRepository $common)
    {
        $this->order = $order;
        $this->common = $common;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        if($request->ajax()){
            $order = $this->order->query(['orders.id as id', 'orders.name as name', 'orders.total as total', 'orders.customer_id as customer_id', 'orders.paymentmethod_id as paymentmethod_id', 'orders.shipstatus_id as shipstatus_id', 'orders.created_at'])->join('customers','customers.id','=','orders.customer_id')->join('payment_methods','payment_methods.id','=','orders.paymentmethod_id')->join('ship_statuses','ship_statuses.id','=','orders.shipstatus_id');
            return Datatables::of($order)
                ->addColumn('action', function($order){
                    return '<a href="'.route('admin.order.show', $order->id).'" class="btn btn-success btn-sm d-inline-block"><i class="fa fa-eye"></i> </a>';
                })->editColumn('total', function($order){
                    return number_format($order->total);
                })->editColumn('customer_id', function($order){
                    $customer_name = $order->customers->name;
                    return $customer_name;
                })->editColumn('paymentmethod_id', function($order){
                    $payment = $order->paymentmethods->name_vi;
                    return $payment;
                })->editColumn('shipstatus_id','Admin::datatables.shipstatus_option', compact('abc'))
                ->editColumn('created_at',function($order){
                    return $time = Carbon::parse($order->created_at)->format('d/m/Y');
                })->filter(function($query) use ($request){
                    if (request()->has('name')) {
                        $query->where('name', 'like', "%{$request->input('name')}%");
                    }
                })->setRowId('id')->make(true);
        }
        return view('Admin::pages.order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('img_url')){
            $img_url = $this->common->getPath($request->input('img_url'));
        }else{
            $img_url = '';
        }
        $order = $this->order->getOrder();

        $data = [
            'name_vi' => $request->input('name_vi'),
            'name_en' => $request->input('name_en'),
            'slug' => \LP_lib::unicode($request->input('name_vi')),
            'content_vi' => $request->input('content_vi'),
            'content_en' => $request->input('content_en'),
            'img_url' => $img_url,
            'type' => $request->input('type'),
        ];
        $order = $this->order->create($data);

        if($request->has('seo_checking')){
            if($request->has('meta_img')){
                $img_meta = $this->common->getPath($request->input('meta_img'));
            }else{
                $img_meta = '';
            }
            $data_seo = [
                'meta_keyword' => $request->input('keywords'),
                'meta_description' => $request->input('description'),
                'meta_img' => $img_meta,
            ];
            $order->metas()->save(new \App\Models\Meta($data_seo));
        }
        return redirect()->route('admin.order.index')->with('success','Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->order->find($id,['id','name', 'total', 'promotion_id', 'paymentmethod_id', 'shipstatus_id','customer_id'], ['customers', 'paymentmethods', 'shipstatus', 'products']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inst = $this->order->find($id);
        return view('Admin::pages.order.edit', compact('inst'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img_url = $this->common->getPath($request->input('img_url'));
        $data = [
            'name_vi' => $request->input('name_vi'),
            'name_en' => $request->input('name_en'),
            'slug' => \LP_lib::unicode($request->input('name_vi')),
            'content_vi' => $request->input('content_vi'),
            'content_en' => $request->input('content_en'),
            'img_url' => $img_url,
            'type' => $request->input('type'),
        ];
        $order = $this->order->update($data, $id);

        if($request->has('seo_checking')){
            $img_meta = $this->common->getPath($request->input('meta_img'));

            $data_seo = [
                'meta_keyword' => $request->input('keywords'),
                'meta_description' => $request->input('description'),
                'meta_img' => $img_meta,
            ];
            if(!$request->has('meta_id')){
                $order->metas()->save(new \App\Models\Meta($data_seo));
            }else{
                \DB::table('metables')->where('id',$request->input('meta_id'))->update($data_seo);
            }
        }

        return redirect()->route('admin.order.index')->with('success', 'Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->order->delete($id);
        return redirect()->route('admin.order.index')->with('success','Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $data = $request->arr;
            $response = $this->order->deleteAll($data);
            return response()->json(['msg' => 'ok']);
        }
    }

    /*UPDATE ORDER*/
    public function postAjaxUpdateOrder(Request $request)
    {
        if(!$request->ajax())
        {
            abort('404', 'Not Access');
        }else{
            $data = $request->input('data');
            foreach($data as $k => $v){
                $upt  =  [
                    'order' => $v,
                ];
                $obj = $this->order->find($k);
                $obj->update($upt);
            }
            return response()->json(['msg' =>'ok', 'code'=>200], 200);
        }
    }

    /*CHANGE STATUS*/
    public function updateStatus(Request $request)
    {
        if(!$request->ajax()){
            abort('404', 'Not Access');
        }else{
            $value = $request->input('value');
            $id = $request->input('id');
            $order = $this->order->find($id);
            $order->status = $value;
            $order->save();
            return response()->json([
                'mes' => 'Updated',
                'error'=> false,
            ], 200);
        }
    }
}
