<?php
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use DB;
use Carbon\Carbon;

class CustomerController extends Controller
{
    protected $customer;
    protected $common;
    public function __construct(CustomerRepository $customer, CommonRepository $common)
    {
        $this->customer = $customer;
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
            $customer = $this->customer->query(['customers.id as id', 'customers.name as name', 'customers.email as email', 'customers.phone as phone', 'customers.created_at as created_at']);
            return Datatables::of($customer)
                ->addColumn('action', function($customer){
                    return '<a href="'.route('admin.customer.show', $customer->id).'" class="btn btn-success btn-sm d-inline-block" title="Chi tiết"><i class="fa fa-eye"></i></a>
                <form method="POST" action=" '.route('admin.customer.destroy', $customer->id).' " accept-charset="UTF-8" class="d-inline-block">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-sm" type="button" attrid=" '.route('admin.customer.destroy', $customer->id).' " onclick="confirm_remove(this);" > <i class="fa fa-trash"></i></button>
               </form>' ;
                })->editColumn('created_at', function($customer){
                    return $register_date = Carbon::parse($customer->created_at)->format('d/m/Y');
                })->addColumn('order_url',function($customer){
                    return route('admin.customer.order',$customer->id);
                })
                ->filter(function($query) use ($request){
                    if (request()->has('name')) {
                        $query->where('name_vi', 'like', "%{$request->input('name')}%");
                    }
                })->setRowId('id')->make(true);
        }

        return view('Admin::pages.customer.index');
    }

    public function getOrderCustomer($id)
    {
        $order = DB::table('orders')->where('customer_id',$id)->select('id','name','total','created_at');
        return Datatables::of($order)
            ->addColumn('action',function($order){
                return '<a href="'.route('admin.order.show', $order->id).'" class="btn btn-success btn-sm d-inline-block" title="Chi tiết"><i class="fa fa-eye"></i></a>';
            })->editColumn('total', function($order){
                return number_format($order->total). ' vnd';
            })->editColumn('created_at',function($order){
                return Carbon::parse($order->created_at)->format('d/m/Y');
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->lists('name_vi', 'id');
        return view('Admin::pages.customer.create', compact('categories'));
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
        $order = $this->customer->getOrder();

        $data = [
            'name_vi' => $request->input('name_vi'),
            'name_en' => $request->input('name_en'),
            'slug' => \LP_lib::unicode($request->input('name_vi')),
            'content_vi' => $request->input('content_vi'),
            'content_en' => $request->input('content_en'),
            'category_id' => $request->input('category_id'),
            'img_url' => $img_url,
            'order' => $order,
        ];
        $customer = $this->customer->create($data);

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
            $customer->metas()->save(new \App\Models\Meta($data_seo));
        }


        return redirect()->route('admin.customer.index')->with('success','Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = DB::table('categories')->lists('name_vi', 'id');
        $inst = $this->customer->find($id);
        return view('Admin::pages.customer.edit', compact('inst', 'categories'));
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
            'category_id' => $request->input('category_id'),
            'img_url' => $img_url,
            'order' => $request->input('order'),
            'status' => $request->input('status'),
        ];
        $customer = $this->customer->update($data, $id);

        if($request->has('seo_checking')){
            $img_meta = $this->common->getPath($request->input('meta_img'));
            $data_seo = [
                'meta_keyword' => $request->input('keywords'),
                'meta_description' => $request->input('description'),
                'meta_img' => $img_meta,
            ];
            if(!$request->has('meta_id')){
                $customer->metas()->save(new \App\Models\Meta($data_seo));
            }else{
                \DB::table('metables')->where('id',$request->input('meta_id'))->update($data_seo);
            }
        }

        return redirect()->route('admin.customer.index')->with('success', 'Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customer->delete($id);
        return redirect()->route('admin.customer.index')->with('success','Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $data = $request->arr;
            $response = $this->customer->deleteAll($data);
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
                $obj = $this->customer->find($k);
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
            $customer = $this->customer->find($id);
            $customer->status = $value;
            $customer->save();
            return response()->json([
                'mes' => 'Updated',
                'error'=> false,
            ], 200);
        }
    }
}
