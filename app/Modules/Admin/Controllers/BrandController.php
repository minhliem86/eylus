<?php
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use DB;

class BrandController extends Controller
{
    protected $brand;
    protected $common;
    public function __construct(BrandRepository $brand, CommonRepository $common)
    {
        $this->brand = $brand;
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
            $brand = $this->brand->query(['brands.id as id', 'brands.name_vi as name_vi', 'brands.img_url as img_url', 'brands.order as order', 'brands.status as status', 'brands.category_id as category_id', 'categories.name_vi as category_name'])->join('categories','categories.id', '=', 'brands.category_id');
            return Datatables::of($brand)
                ->addColumn('action', function($brand){
                    return '<a href="'.route('admin.brand.edit', $brand->id).'" class="btn btn-success btn-sm d-inline-block"><i class="fa fa-edit"></i> </a>
                <form method="POST" action=" '.route('admin.brand.destroy', $brand->id).' " accept-charset="UTF-8" class="d-inline-block">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-sm" type="button" attrid=" '.route('admin.brand.destroy', $brand->id).' " onclick="confirm_remove(this);" > <i class="fa fa-trash"></i></button>
               </form>' ;
                })->editColumn('order', function($brand){
                    return "<input type='text' name='order' class='form-control' data-id= '".$brand->id."' value= '".$brand->order."' />";
                })->editColumn('status', function($brand){
                    $status = $brand->status ? 'checked' : '';
                    $brand_id =$brand->id;
                    return '
                  <label class="switch switch-icon switch-success-outline">
                    <input type="checkbox" class="switch-input" name="status" '.$status.' data-id="'.$brand_id.'">
                    <span class="switch-label" data-on="" data-off=""></span>
                    <span class="switch-handle"></span>
                </label>
              ';
                })->editColumn('img_url',function($brand){
                    return '<img src="'.asset('public/uploads/'.$brand->img_url).'" width="120" class="img-fluid">';
                })->filter(function($query) use ($request){
                    if (request()->has('name')) {
                        $query->where('name_vi', 'like', "%{$request->input('name')}%");
                    }
                })->setRowId('id')->make(true);
        }

        return view('Admin::pages.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->lists('name_vi', 'id');
        return view('Admin::pages.brand.create', compact('categories'));
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
        $order = $this->brand->getOrder();

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
        $this->brand->create($data);
        return redirect()->route('admin.brand.index')->with('success','Created !');
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
        $inst = $this->brand->find($id);
        return view('Admin::pages.brand.edit', compact('inst', 'categories'));
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
        $this->brand->update($data, $id);
        return redirect()->route('admin.brand.index')->with('success', 'Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->brand->delete($id);
        return redirect()->route('admin.brand.index')->with('success','Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $data = $request->arr;
            $response = $this->brand->deleteAll($data);
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
                $obj = $this->brand->find($k);
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
            $brand = $this->brand->find($id);
            $brand->status = $value;
            $brand->save();
            return response()->json([
                'mes' => 'Updated',
                'error'=> false,
            ], 200);
        }
    }
}
