<?php
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\VideoRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use DB;

class VideoController extends Controller
{
    protected $video;
    protected $common;
    public function __construct(VideoRepository $video, CommonRepository $common)
    {
        $this->video = $video;
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
            $video = $this->video->query(['id', 'name_vi', 'video_url', 'order', 'status']);
            return Datatables::of($video)
                ->addColumn('action', function($video){
                    return '<a href="'.route('admin.video.edit', $video->id).'" class="btn btn-success btn-sm d-inline-block"><i class="fa fa-edit"></i> </a>
                <form method="POST" action=" '.route('admin.video.destroy', $video->id).' " accept-charset="UTF-8" class="d-inline-block">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-sm" type="button" attrid=" '.route('admin.video.destroy', $video->id).' " onclick="confirm_remove(this);" > <i class="fa fa-trash"></i></button>
               </form>' ;
                })->editColumn('order', function($video){
                    return "<input type='text' name='order' class='form-control' data-id= '".$video->id."' value= '".$video->order."' />";
                })->editColumn('status', function($video){
                    $status = $video->status ? 'checked' : '';
                    $video_id =$video->id;
                    return '
                  <label class="switch switch-icon switch-success-outline">
                    <input type="checkbox" class="switch-input" name="status" '.$status.' data-id="'.$video_id.'">
                    <span class="switch-label" data-on="" data-off=""></span>
                    <span class="switch-handle"></span>
                </label>
              ';
                })->filter(function($query) use ($request){
                    if (request()->has('name')) {
                        $query->where('title_vi', 'like', "%{$request->input('name')}%");
                    }
                })->setRowId('id')->make(true);
        }

        return view('Admin::pages.video.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = $this->video->getOrder();

        $data = [
            'name_vi' => $request->input('name_vi'),
            'name_en' => $request->input('name_en'),
            'video_url' => $request->input('video_url'),
            'order' => $order,
        ];
        $video = $this->video->create($data);

        return redirect()->route('admin.video.index')->with('success','Created !');
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
        $inst = $this->video->find($id);
        return view('Admin::pages.video.edit', compact('inst'));
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
        $data = [
            'name_vi' => $request->input('name_vi'),
            'name_en' => $request->input('name_en'),
            'video_url' => $request->input('video_url'),
            'order' => $request->input('order'),
            'status' => $request->input('status'),
        ];
        $video = $this->video->update($data, $id);

        return redirect()->route('admin.video.index')->with('success', 'Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->video->delete($id);
        return redirect()->route('admin.video.index')->with('success','Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $data = $request->arr;
            $response = $this->video->deleteAll($data);
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
                $obj = $this->video->find($k);
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
            $video = $this->video->find($id);
            $video->status = $value;
            $video->save();
            return response()->json([
                'mes' => 'Updated',
                'error'=> false,
            ], 200);
        }
    }
}
