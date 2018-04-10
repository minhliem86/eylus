<?php
namespace App\Modules\Admin\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PromotionCodeRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;

class PromotionCodeController extends Controller
{
    protected $promotioncode;
    protected $common;
    public function __construct(PromotionCodeRepository $promotioncode, CommonRepository $common)
    {
        $this->promotioncode = $promotioncode;
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
            $promotioncode = $this->promotioncode->query(['id', 'name', 'sku_promotion', 'type', 'value', 'value_type', 'quantity', 'status', 'from_time', 'to_time', 'num_use']);
            return Datatables::of($promotioncode)
                ->addColumn('action', function($promotioncode){
                    return '<a href="'.route('admin.promotioncode.edit', $promotioncode->id).'" class="btn btn-success btn-sm d-inline-block"><i class="fa fa-edit"></i> </a>
                <form method="POST" action=" '.route('admin.promotioncode.destroy', $promotioncode->id).' " accept-charset="UTF-8" class="d-inline-block">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-sm" type="button" attrid=" '.route('admin.promotioncode.destroy', $promotioncode->id).' " onclick="confirm_remove(this);" > <i class="fa fa-trash"></i></button>
               </form>' ;
                })->addColumn('time', function($promotioncode){
                    $from_time = Carbon::parse($promotioncode->from_time)->format('d-m-Y');
                    $to_time = Carbon::parse($promotioncode->to_time)->format('d-m-Y');
                    return $time = $from_time . ' - '. $to_time;
                })->addColumn('value',function($promotioncode){
                    $value = $promotioncode->value. ' ' .$promotioncode->value_type;
                    return $value;
                })->editColumn('status', function($promotioncode){
                    $status = $promotioncode->status ? 'checked' : '';
                    $promotioncode_id =$promotioncode->id;
                    return '
                  <label class="switch switch-icon switch-success-outline">
                    <input type="checkbox" class="switch-input" name="status" '.$status.' data-id="'.$promotioncode_id.'">
                    <span class="switch-label" data-on="" data-off=""></span>
                    <span class="switch-handle"></span>
                </label>
              ';
                })->editColumn('img_url',function($promotioncode){
                    return '<img src="'.asset('public/uploads/'.$promotioncode->img_url).'" width="60" class="img-fluid">';
                })->filter(function($query) use ($request){
                    if (request()->has('name')) {
                        $query->where('sku_promotion', 'like', "%{$request->input('name')}%");
                    }
                })->setRowId('id')->make(true);
        }

        return view('Admin::pages.promotioncode.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.promotioncode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $from = Carbon::createFromFormat('d-m-Y', $request->input('from_time'))->format('Y-m-d');
        $to = Carbon::createFromFormat('d-m-Y', $request->input('to_time'))->format('Y-m-d');


        $data = [
            'name' => $request->input('name'),
            'slug' => $request->input('name'),
            'sku_promotion' => strtoupper(str_replace(' ', '', $request->input('sku_promotion'))) ,
            'description' => $request->input('description'),
            'type' => 'discount',
            'target' => 'subtotal',
            'value' => intval(str_replace(',','',$request->value)),
            'value_type' => $request->input('value_type'),
            'quantity' => intval(str_replace(',','',$request->quantity)),
            'from_time' =>$from,
            'to_time' => $to,
        ];

        $promotioncode = $this->promotioncode->create($data);

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
            $promotioncode->metas()->save(new \App\Models\Meta($data_seo));
        }
        return redirect()->route('admin.promotioncode.index')->with('success','Created !');
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
        $inst = $this->promotioncode->find($id);
        return view('Admin::pages.promotioncode.edit', compact('inst'));
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
        $from = Carbon::createFromFormat('d-m-Y', $request->input('from_time'))->format('Y-m-d');
        $to = Carbon::createFromFormat('d-m-Y', $request->input('to_time'))->format('Y-m-d');

        $data = [
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'sku_promotion' => strtoupper(str_replace(' ', '', $request->input('sku_promotion'))) ,
            'description' => $request->input('description'),
            'type' => 'discount',
            'target' => 'subtotal',
            'value' => intval(str_replace(',','',$request->value)),
            'value_type' => $request->input('value_type'),
            'quantity' => intval(str_replace(',','',$request->quantity)),
            'from_time' =>$from,
            'to_time' => $to,
            'status' => $request->input('status')
        ];

        $promotioncode = $this->promotioncode->update($data, $id);

        if($request->has('seo_checking')){
            $img_meta = $this->common->getPath($request->input('meta_img'));
            $data_seo = [
                'meta_keyword' => $request->input('keywords'),
                'meta_description' => $request->input('description'),
                'meta_img' => $img_meta,
            ];
            if(!$request->has('meta_id')){
                $promotioncode->metas()->save(new \App\Models\Meta($data_seo));
            }else{
                \DB::table('metables')->where('id',$request->input('meta_id'))->update($data_seo);
            }
        }

        return redirect()->route('admin.promotioncode.index')->with('success', 'Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->promotioncode->delete($id);
        return redirect()->route('admin.promotioncode.index')->with('success','Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $data = $request->arr;
            $response = $this->promotioncode->deleteAll($data);
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
                $obj = $this->promotioncode->find($k);
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
            $promotioncode = $this->promotioncode->find($id);
            $promotioncode->status = $value;
            $promotioncode->save();
            return response()->json([
                'mes' => 'Updated',
                'error'=> false,
            ], 200);
        }
    }
}
