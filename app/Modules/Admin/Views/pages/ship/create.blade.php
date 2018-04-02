@extends('Admin::layouts.default')

@section('title','Giá Shipping')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                {!! Form::open(['route'=>'admin.ship.store', 'class' =>'form']) !!}
                <div class="card-header">
                    <strong>QUẢN LÝ GIÁ SHIP</strong>
                </div>
                <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Tên Shipping</label>
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
                                        <input type="text" class="form-control" name="name_vi">
                                    </div>
                                    <div class="tab-pane fade" id="name_en" role="tabpanel" aria-labelledby="pills-name_en">
                                        <input type="text" class="form-control" name="name_en">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Mô tả</label>
                            <div class="col-md-9">
                                <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="pill" href="#description_vi" role="tab" aria-controls="pills-description_vi">VI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#description_en" role="tab" aria-controls="pills-description_en">EN</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="description_vi" role="tabpanel" aria-labelledby="pills-description_vi">
                                        {!! Form::textarea('description_vi',old('description_vi'), ['class'=> 'form-control my-editor', 'rows' => 10]) !!}
                                    </div>
                                    <div class="tab-pane fade" id="description_en" role="tabpanel" aria-labelledby="pills-description_en">
                                        {!! Form::textarea('description_en',old('description_en'), ['class'=> 'form-control my-editor', 'rows' => 10]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Giá</label>
                            <div class="col-md-9">
                                <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="pill" href="#price_vi" role="tab" aria-controls="pills-price_vi">VI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#price_en" role="tab" aria-controls="pills-price_en">EN</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="price_vi" role="tabpanel" aria-labelledby="pills-price_vi">
                                        {!! Form::text('price_vi',old('price_vi'), ['class'=> 'form-control']) !!}
                                    </div>
                                    <div class="tab-pane fade" id="price_en" role="tabpanel" aria-labelledby="pills-price_en">
                                        {!! Form::text('price_en',old('price_en'), ['class'=> 'form-control']) !!}
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
