@extends('Admin::layouts.default')

@section('title','Tin Tức')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>TIN TỨC</strong>
                </div>
                {!! Form::open(['route'=>'admin.news.store', 'class' =>'form']) !!}
                <div class="card-body">
                        <div class="card-body">
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
                            <!--/.row-->
                        </div>
                        <div class="card-footer">
                            <div class="col-md-9 offset-md-3">
                                <a href="{!! url()->previous() !!}" class="btn btn-danger text-white"><i class="fa fa-arrow-left"></i> Back</a>
                                <button class="btn btn-success" type="submit"><i class="fa fa-dot-circle-o"></i> Save</button>
                            </div>
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

    </script>
@stop
