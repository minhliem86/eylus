@extends('Admin::layouts.default')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    Dahsboard
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!--  DATE PICKER -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--CHART-->
    <script src="{{asset('/public/assets/admin')}}/dist/js/Chart.js"></script>

    <script>
        $(document).ready(function(){
            // DATETIME
            $('.input-daterange input').each(function() {
                $(this).datepicker({
                    maxDate: '0',
                    dateFormat: 'dd-mm-yy'
                });
            });
        });
    </script>
@stop
