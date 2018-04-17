@extends('Admin::layouts.default')

@section('title','Video')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                {!! Form::open(['route'=>'admin.video.store', 'class' =>'form']) !!}
                <div class="card-header">
                    <strong>VIDEO</strong>
                </div>
                <div class="card-body">
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Tên Video</label>
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
                            <label class="col-md-3 col-form-label" for="title">Video ID</label>
                            <div class="col-md-9">
                                {!! Form::text('video_url', old('video_url'), ['class'=>'form-control']) !!}
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
