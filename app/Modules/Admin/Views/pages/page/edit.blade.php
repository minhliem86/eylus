@extends('Admin::layouts.default')

@section('title','Trang Đơn')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                {!!  Form::model($inst, ['route'=>['admin.page.update',$inst->id], 'method'=>'put' ])!!}
                <div class="card-header">
                    <strong>TRANG ĐƠN</strong>
                </div>
                <div class="card-body">
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Tên Trang</label>
                            <div class="col-md-9">
                                <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="pill" href="#name_vi" role="tab" aria-controls="pills-name_vi">VI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#name_en" role="tab" aria-controls="pills-name_en">EN</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="name_vi" role="tabpanel" aria-labelledby="pills-name_vi">
                                        {!! Form::text('name_vi', old('name_vi'), ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="tab-pane fade" id="name_en" role="tabpanel" aria-labelledby="pills-name_en">
                                        {!! Form::text('name_en', old('name_en'), ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Nội Dung</label>
                            <div class="col-md-9">
                                <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="pill" href="#description_vi" role="tab" aria-controls="pills-title_vi">VI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#description_en" role="tab" aria-controls="pills-title_en">EN</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="description_vi" role="tabpanel" aria-labelledby="pills-title_vi">
                                        {!! Form::textarea('content_vi',old('content_vi'), ['class'=> 'form-control my-editor', 'rows' => 10]) !!}
                                    </div>
                                    <div class="tab-pane fade" id="description_en" role="tabpanel" aria-labelledby="pills-title_en">
                                        {!! Form::textarea('content_en',old('content_en'), ['class'=> 'form-control my-editor', 'rows' => 10]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="type">Sắp xếp</label>
                            <div class="col-md-9">
                                {!! Form::select('type',['static'=>'Trang tĩnh', 'other'=>'Trang Footer'], old('type'), ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Hình đại diện:</label>
                            <div class="col-md-9">
                                <div class="input-group">
                             <span class="input-group-btn">
                               <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary btn-sm text-white">
                                 <i class="fa fa-picture-o"></i> Choose
                               </a>
                             </span>
                                    {{Form::hidden('img_url',old('img_url'), ['class'=>'form-control', 'id'=>'thumbnail' ])}}
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;" src="{{asset('public/uploads/'.$inst->img_url)}}">
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <div class="form-group row">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="seo_checking" name="seo_checking" {!! $inst->metas()->count() ? 'checked' : null  !!} class="custom-control-input ">
                                <label class="custom-control-label" for="seo_checking"><b>CẤU HÌNH SEO</b></label>
                            </div>
                        </div>
                        <div class="seo-container">

                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Keywords</label>
                                <div class="col-md-9">
                                    {!! Form::text('keywords',$inst->metas()->count() ? $inst->metas()->first()->meta_keyword : '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Description</label>
                                <div class="col-md-9">
                                    {!! Form::text('description',$inst->metas()->count() ? $inst->metas()->first()->meta_description : '', ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" >FB Sharing (600x315):</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm_meta" data-input="thumbnail_meta" data-preview="holder" class="btn btn-primary text-white">
                                            <i class="fa fa-picture-o"></i> Chọn
                                        </a>
                                    </span>
                                        {{Form::hidden('meta_img',$inst->metas()->count() ? old($inst->metas()->first()->meta_img) : '', ['class'=>'form-control', 'id'=>'thumbnail_meta' ])}}

                                    </div>

                                    <img id="holder" style="margin-top:15px;max-height:100px;"{!! $inst->metas()->count() ? 'src="'.asset('public/uploads/'.$inst->metas()->first()->meta_img).'"' : null  !!} >
                                </div>
                            </div>
                            {!! Form::hidden('meta_id',$inst->metas()->count() ? $inst->metas()->first()->id : '') !!}
                        </div>
                    </fieldset>
                </div>
                <div class="card-footer">
                    <div class="col-md-9 offset-md-3">
                        <a href="{!! url()->previous() !!}" class="btn btn-danger text-white"><i class="fa fa-arrow-left"></i> Back</a>
                        <button class="btn btn-success" type="submit"><i class="fa fa-dot-circle-o"></i> Save</button>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('public')}}/vendor/laravel-filemanager/js/lfm.js"></script>
    <script src="{{asset('public/assets/admin/js/script.js')}}"></script>
    <script>
        const url = "{{url('/')}}"
        init_tinymce(url);
        // BUTTON ALONE
        init_btnImage(url,'#lfm');
        init_btnImage(url,'#lfm_meta');

        $(document).on('change', 'input[name=status]', function(){
            if($(this).prop('checked')){
                $(this).val(1);
            }else{
                $(this).val(0);
            }
        })

    </script>
@stop
