<?php
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;

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
            $news = $this->news->query(['id', 'title', 'img_url', 'order', 'status']);
            return Datatables::of($news)
                ->addColumn('action', function($news){
                    return '<a href="'.route('admin.news.edit', $news->id).'" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> </a>
                <form method="POST" action=" '.route('admin.news.destroy', $news->id).' " accept-charset="UTF-8" class="inline-block-span">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-xs" type="button" attrid=" '.route('admin.news.destroy', $news->id).' " onclick="confirm_remove(this);" > <i class="fa fa-trash"></i></button>
               </form>' ;
                })->editColumn('order', function($news){
                    return "<input type='text' name='order' class='form-control' data-id= '".$news->id."' value= '".$news->order."' />";
                })->editColumn('status', function($news){
                    $status = $news->status ? 'checked' : '';
                    $news_id =$news->id;
                    return '
                  <label class="switch switch-icon switch-success-outline">
                    <input type="checkbox" class="switch-input" '.$status.' data-id="'.$news_id.'">
                    <span class="switch-label" data-on="" data-off=""></span>
                    <span class="switch-handle"></span>
                </label>
              ';
                })->editColumn('img_url',function($news){
                    return '<img src="'.$news->avatar_img.'" width="120" class="img-fluid">';
                })->filter(function($query) use ($request){
                    if (request()->has('name')) {
                        $query->where('title', 'like', "%{$request->input('name')}%");
                    }
                })->setRowId('id')->make(true);
        }

        return view('Admin::pages.news.index');
    }

//    public function getData(Request $request)
//    {
//        $news = DB::table('newsgories')->select(['id', 'title', 'avatar_img', 'order', 'status']);
//        return Datatables::of($news)
//            ->addColumn('action', function($news){
//                return '<a href="'.route('admin.news.edit', $news->id).'" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> </a>
//                <form method="POST" action=" '.route('admin.news.destroy', $news->id).' " accept-charset="UTF-8" class="inline-block-span">
//                    <input name="_method" type="hidden" value="DELETE">
//                    <input name="_token" type="hidden" value="'.csrf_token().'">
//                               <button class="btn  btn-danger btn-xs" type="button" attrid=" '.route('admin.news.destroy', $news->id).' " onclick="confirm_remove(this);" > <i class="fa fa-trash"></i></button>
//               </form>' ;
//            })->addColumn('order', function($news){
//                return "<input type='text' name='order' class='form-control' data-id= '".$news->id."' value= '".$news->order."' />";
//            })->addColumn('status', function($news){
//                $status = $news->status ? 'checked' : '';
//                $news_id =$news->id;
//                return '
//                  <label class="switch switch-icon switch-success-outline">
//                    <input type="checkbox" class="switch-input" '.$status.' data-id="'.$news_id.'">
//                    <span class="switch-label" data-on="" data-off=""></span>
//                    <span class="switch-handle"></span>
//                </label>
//              ';
//            })->editColumn('avatar_img',function($news){
//                return '<img src="'.$news->avatar_img.'" width="120" class="img-responsive">';
//            })->filter(function($query) use ($request){
//                if (request()->has('name')) {
//                    $query->where('title', 'like', "%{$request->input('name')}%");
//                }
//            })->setRowId('id')->make(true);
//    }

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
            'title' => $request->input('title'),
            'slug' => \LP_lib::unicode($request->input('title')),
            'img_url' => $img_url,
            'order' => $order,
        ];
        $this->news->create($data);
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
            'title' => $request->input('title'),
            'slug' => \LP_lib::unicode($request->input('title')),
            'avatar_img' => $img_url,
            'order' => $request->input('order'),
            'status' => $request->input('status'),
        ];
        $this->news->update($data, $id);
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