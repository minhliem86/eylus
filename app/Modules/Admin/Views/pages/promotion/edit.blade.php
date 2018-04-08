@extends('Admin::layouts.default')

@section('title','Tin Khuyến Mãi')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                {!!  Form::model($inst, ['route'=>['admin.promotion.update',$inst->id], 'method'=>'put' ])!!}
                <div class="card-header">
                    <strong>TIN KHUYẾN MÃI</strong>
                </div>
                <div class="card-body">
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Bài Viết</label>
                            <div class="col-md-9">
                                <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="pill" href="#title_vi" role="tab" aria-controls="pills-title_vi">VI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#title_en" role="tab" aria-controls="pills-title_en">EN</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="title_vi" role="tabpanel" aria-labelledby="pills-title_vi">
                                        {{Form::text('title_vi',old('title_vi'), ['class'=>'form-control', 'placeholder'=>'Title'])}}
                                    </div>
                                    <div class="tab-pane fade" id="title_en" role="tabpanel" aria-labelledby="pills-title_en">
                                        {{Form::text('title_en',old('title_en'), ['class'=>'form-control', 'placeholder'=>'Title'])}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Nội Dung</label>
                            <div class="col-md-9">
                                <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="pill" href="#content_vi" role="tab" aria-controls="pills-content_vi">VI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#content_en" role="tab" aria-controls="pills-content_en">EN</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="content_vi" role="tabpanel" aria-labelledby="pills-title_vi">
                                        {!! Form::textarea('content_vi',old('content_vi'), ['class'=> 'form-control my-editor', 'rows' => 10]) !!}
                                    </div>
                                    <div class="tab-pane fade" id="content_en" role="tabpanel" aria-labelledby="pills-content_en">
                                        {!! Form::textarea('content_en',old('content_en'), ['class'=> 'form-control my-editor', 'rows' => 10]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="description">Sắp xếp</label>
                            <div class="col-md-9">
                                {{Form::text('order',old('order'), ['class'=>'form-control', 'placeholder'=>'order'])}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="description">Trạng thái</label>
                            <div class="col-md-9">
                                <label class="switch switch-icon switch-success-outline">
                                    <input type="checkbox" class="switch-input" name="status" value="{!! $inst->status ? 1 : 0 !!}" {!! $inst->status ? "checked" : null  !!} data-id="{!! $inst->id !!}">
                                    <span class="switch-label" data-on="" data-off=""></span>
                                    <span class="switch-handle"></span>
                                </label>
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
                                        <a id="lfm_meta" data-input="thumbnail_meta" data-preview="meta_preview" class="btn btn-primary text-white">
                                            <i class="fa fa-picture-o"></i> Chọn
                                        </a>
                                    </span>
                                        {{Form::hidden('meta_img',$inst->metas()->count() ? old($inst->metas()->first()->meta_img) : '', ['class'=>'form-control', 'id'=>'thumbnail_meta' ])}}

                                    </div>

                                    <img id="meta_preview" style="margin-top:15px;max-height:100px;"{!! $inst->metas()->count() ? 'src="'.asset('public/uploads/'.$inst->metas()->first()->meta_img).'"' : null  !!} >
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
