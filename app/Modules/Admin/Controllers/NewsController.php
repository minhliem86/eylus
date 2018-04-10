<?php
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use DB;

class NewsController extends Controller
{
    protected $news;
    protected $common;
    public function __construct(NewsRepository $news, CommonRepository $common)
    {
        $this->news = $news;
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
            $news = $this->news->query(['id', 'title_vi', 'img_url', 'order', 'status']);
            return Datatables::of($news)
                ->addColumn('action', function($news){
                    return '<a href="'.route('admin.news.edit', $news->id).'" class="btn btn-success btn-sm d-inline-block"><i class="fa fa-edit"></i> </a>
                <form method="POST" action=" '.route('admin.news.destroy', $news->id).' " accept-charset="UTF-8" class="d-inline-block">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-sm" type="button" attrid=" '.route('admin.news.destroy', $news->id).' " onclick="confirm_remove(this);" > <i class="fa fa-trash"></i></button>
               </form>' ;
                })->editColumn('order', function($news){
                    return "<input type='text' name='order' class='form-control' data-id= '".$news->id."' value= '".$news->order."' />";
                })->editColumn('status', function($news){
                    $status = $news->status ? 'checked' : '';
                    $news_id =$news->id;
                    return '
                  <label class="switch switch-icon switch-success-outline">
                    <input type="checkbox" class="switch-input" name="status" '.$status.' data-id="'.$news_id.'">
                    <span class="switch-label" data-on="" data-off=""></span>
                    <span class="switch-handle"></span>
                </label>
              ';
                })->editColumn('img_url',function($news){
                    return '<img src="'.asset('public/uploads/'.$news->img_url).'" width="60" class="img-fluid">';
                })->filter(function($query) use ($request){
                    if (request()->has('name')) {
                        $query->where('title_vi', 'like', "%{$request->input('name')}%");
                    }
                })->setRowId('id')->make(true);
        }

        return view('Admin::pages.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.news.create');
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
        $order = $this->news->getOrder();

        $data = [
            'title_vi' => $request->input('title_vi'),
            'title_en' => $request->input('title_en'),
            'slug' => \LP_lib::unicode($request->input('title_vi')),
            'content_vi' => $request->input('content_vi'),
            'content_en' => $request->input('content_en'),
            'img_url' => $img_url,
            'order' => $order,
        ];
        $news = $this->news->create($data);

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
            $news->metas()->save(new \App\Models\Meta($data_seo));
        }
        return redirect()->route('admin.news.index')->with('success','Created !');
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
        $inst = $this->news->find($id);
        return view('Admin::pages.news.edit', compact('inst'));
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
            'title_vi' => $request->input('title_vi'),
            'title_en' => $request->input('title_en'),
            'slug' => \LP_lib::unicode($request->input('title_vi')),
            'content_vi' => $request->input('content_vi'),
            'content_en' => $request->input('content_en'),
            'img_url' => $img_url,
            'order' => $request->input('order'),
            'status' => $request->input('status'),
        ];
        $news = $this->news->update($data, $id);

        if($request->has('seo_checking')){
            $img_meta = $this->common->getPath($request->input('meta_img'));
            $data_seo = [
                'meta_keyword' => $request->input('keywords'),
                'meta_description' => $request->input('description'),
                'meta_img' => $img_meta,
            ];
            if(!$request->has('meta_id')){
                $news->metas()->save(new \App\Models\Meta($data_seo));
            }else{
                \DB::table('metables')->where('id',$request->input('meta_id'))->update($data_seo);
            }
        }

        return redirect()->route('admin.news.index')->with('success', 'Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->news->delete($id);
        return redirect()->route('admin.news.index')->with('success','Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $data = $request->arr;
            $response = $this->news->deleteAll($data);
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
                $obj = $this->news->find($k);
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
            $news = $this->news->find($id);
            $news->status = $value;
            $news->save();
            return response()->json([
                'mes' => 'Updated',
                'error'=> false,
            ], 200);
        }
    }
}
