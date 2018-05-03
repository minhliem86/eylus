@extends('Admin::layouts.default')

@section('title','Exchange Rate')

@section('content')
    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissable">
      <p>{!!Session::get('error')!!}</p>
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissable">
      <p>{!!Session::get('success')!!}</p>
    </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="wrap-title">
                            <strong>Tỷ giá</strong>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    @if(!$inst)
                        <form method="POST" action="{{route('admin.exchange.index')}}" id="form" role="form" class="form-horizontal form">
                            {{Form::token()}}
                            <div class="form-group">
                                <label class=" control-label">Name</label>
                                <input type="text" required="" placeholder="Loại tiền tệ" id="address" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label class=" control-label">Value</label>
                                <input type="text" required="" placeholder="Giá trị quy đổi" id="address" class="form-control price" name="value">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit"><i class="fa fa-dot-circle-o"></i> Save</button>
                            </div>

                        </form>
                    @else
                        {{Form::model($inst,['route' =>['admin.exchange.index', $inst->id], 'method'=>'PUT', 'class'=>'form form-horizontal'])}}
                        <div class="form-group">
                            <label class=" control-label">Name</label>
                            {{Form::text('name',old('name'),['class'=>'form-control', 'placeholder'=>'Loại tiền tệ', 'required'])}}
                        </div>
                        <div class="form-group">
                            <label class=" control-label">Value</label>
                            {{Form::text('value',old('value'),['class'=>'form-control price', 'placeholder'=>'Giá trị quy đổi', 'required'])}}
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit"><i class="fa fa-dot-circle-o"></i> Save</button>
                        </div>

                        {{Form::close()}}
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <!--PRICE FORMAT -->
    <script src="{{asset('/public/assets/admin')}}/js/jquery.priceformat.min.js"></script>
    <script>
        $('.price').priceFormat({
            prefix: '',
            centsLimit:0,
        })
    </script>
@stop
