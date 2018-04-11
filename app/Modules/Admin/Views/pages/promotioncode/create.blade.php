@extends('Admin::layouts.default')

@section('title','MÃ KHUYẾN MÃI')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                {!! Form::open(['route'=>'admin.promotioncode.store', 'class' =>'form']) !!}
                <div class="card-header">
                    <strong>MÃ KHUYẾN MÃI</strong>
                </div>
                <div class="card-body">
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Tên Khuyến Mãi</label>
                            <div class="col-md-9">
                                {!! Form::text('name',old('name'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Mã Khuyến Mãi</label>
                            <div class="col-md-9">
                                {!! Form::text('sku_promotion',old('sku_promotion'), ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Mô Tả</label>
                            <div class="col-md-9">
                                {!! Form::textarea('description', old('description'), ['class' => 'form-control my-editor']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Giá Trị</label>
                            <div class="col-md-6">
                                {!! Form::text('value', old('value'), ['class' => 'form-control price', 'required']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::select('value_type', ['%' => '%', '' => 'VND'], old('value_type'), ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Số Lượng</label>
                            <div class="col-md-9">
                                {!! Form::text('quantity', old('quantity'), ['class'=>'form-control quantity', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Thời Gian Hiệu Lực</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('from_time', old('from_time'), ['class' => 'form-control from_time', 'required']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >đến</span>
                                    </div>
                                    {!! Form::text('to_time', old('to_time'), ['class' => 'form-control to_time', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <!--/.row-->
                    </fieldset>

                    <fieldset class="form-group">

                        <div class="form-group row">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="seo_checking" name="seo_checking" class="custom-control-input ">
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
                                        <a id="lfm_meta" data-input="thumbnail_meta" data-preview="meta_preview" class="btn btn-primary text-white">
                                            <i class="fa fa-picture-o"></i> Chọn
                                        </a>
                                    </span>
                                        <input id="thumbnail_meta" class="form-control" type="hidden" name="meta_img">
                                    </div>
                                    <img id="meta_preview" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
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

    <!--PRICE FORMAT -->
    <script src="{{asset('/public/assets/admin')}}/js/jquery.priceformat.min.js"></script>

    <!-- DATE PICKER -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script>
        const url = "{{url('/')}}"
        init_tinymce(url);
        // BUTTON ALONE
        init_btnImage(url,'#lfm_meta');

        $(document).ready(function(){
            $('.price').priceFormat({
                prefix: '',
                centsLimit:0,
                allowNegative: true
            })
            $('.quantity').priceFormat({
                prefix: '',
                centsLimit:0,
            })

            $date = $('.from_time').datepicker({
                endDate: '0d',
                format: 'dd-mm-yyyy',
            }).on('changeDate', function(e){
                $('.to_time').datepicker({
                    format: 'dd-mm-yyyy',
                    startDate: e.date
                })
            });
        })

    </script>
@stop
