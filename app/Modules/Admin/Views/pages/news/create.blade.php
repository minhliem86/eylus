@extends('Admin::layouts.default')

@section('title','Tin Tức')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                {!! Form::open(['route'=>'admin.news.store', 'class' =>'form']) !!}
                <div class="card-header">
                    <strong>TIN TỨC</strong>
                </div>
                <div class="card-body">
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Tên Bài Viết</label>
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
                                        <input type="text" class="form-control" name="title_vi">
                                    </div>
                                    <div class="tab-pane fade" id="title_en" role="tabpanel" aria-labelledby="pills-title_en">
                                        <input type="text" class="form-control" name="title_en">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Nội Dung</label>
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
                                    <div class="tab-pane fade active show" id="content_vi" role="tabpanel" aria-labelledby="pills-content_vi">
                                        {!! Form::textarea('content_vi',old('content_vi'), ['class'=> 'form-control my-editor', 'rows' => 10]) !!}
                                    </div>
                                    <div class="tab-pane fade" id="content_en" role="tabpanel" aria-labelledby="pills-content_en">
                                        {!! Form::textarea('content_en',old('content_en'), ['class'=> 'form-control my-editor', 'rows' => 10]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" >Hình đại diện:</label>
                            <div class="col-md-9">
                                <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Chọn
                                </a>
                            </span>
                                    <input id="thumbnail" class="form-control" type="hidden" name="img_url">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="seo_checking" name="seo_checking" checked class="custom-control-input ">
                                <label class="custom-control-label" for="seo_checking"><b>CẤU HÌNH SEO</b></label>
                            </div>
                        </div>
                        <div class="seo-container">
                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Keywords</label>
                                <div class="col-md-9">
                                    {!! Form::text('keywords',old('keywords'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Description</label>
                                <div class="col-md-9">
                                    {!! Form::text('description',old('description'), ['class' => 'form-control']) !!}
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
                                        <input id="thumbnail_meta" class="form-control" type="hidden" name="meta_img">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <!--/.row-->
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

    </script>
@stop
