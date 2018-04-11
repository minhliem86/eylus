@extends('Admin::layouts.default')

@section('title','MÃ KHUYẾN MÃI')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                {!!  Form::model($inst, ['route'=>['admin.promotioncode.update',$inst->id], 'method'=>'put' ])!!}
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
                                    {!! Form::text('from_time', \Carbon\Carbon::createFromFormat('Y-m-d', $inst->from_time)->format('d-m-Y'), ['class' => 'form-control from_time', 'required']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >đến</span>
                                    </div>
                                    {!! Form::text('to_time', \Carbon\Carbon::createFromFormat('Y-m-d', $inst->to_time)->format('d-m-Y'), ['class' => 'form-control to_time', 'required']) !!}
                                </div>
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
                        <!--/.row-->
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
                                        {{Form::hidden('meta_img',$inst->metas()->count() ? $inst->metas()->first()->meta_img : '', ['class'=>'form-control', 'id'=>'thumbnail_meta' ])}}

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

    <!--PRICE FORMAT -->
    <script src="{{asset('/public/assets/admin')}}/js/jquery.priceformat.min.js"></script>

    <!-- DATE PICKER -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

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

            $('.to_time').datepicker({
                format: 'dd-mm-yyyy',
                startDate: '{!! \Carbon\Carbon::createFromFormat('Y-m-d', $inst->from_time)->format('d-m-Y') !!}'
            });

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
