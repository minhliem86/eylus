@extends('Admin::layouts.default')

@section('title','Create Category')

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
                            <div class="form-group">
                                <label for="title">Tên Bài Viết</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Tên Bài Viết">
                            </div>

                            <div class="form-group">
                                <label for="title">Nội Dung</label>
                                {!! Form::textarea('content',old('content'), ['class'=> 'form-control my-editor']) !!}
                            </div>

                            <div class="form-group">
                                <label >Hình đại diện:</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Chọn
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="hidden" name="img_url">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                            <!--/.row-->
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-dot-circle-o"></i> Save</button>
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
