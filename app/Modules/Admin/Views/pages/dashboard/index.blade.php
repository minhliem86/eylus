@extends('Admin::layouts.default')

@section('title','Dashboard')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-2">
                            <i class="fa fa-boxes"></i>
                        </div>
                        <div class="h4 mb-0">{!! $number_category ? $number_category : 0 !!}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Danh Mục</small>
                        <div class="progress progress-white progress-xs mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {!! $number_category ? $number_category : 0 !!}%" aria-valuenow="{!! $number_category ? $number_category : 0 !!}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-2">
                            <i class="fa fa-code-branch"></i>
                        </div>
                        <div class="h4 mb-0">{!! $number_brand ? $number_brand : 0 !!}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Brands</small>
                        <div class="progress progress-white progress-xs mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {!! $number_brand ? $number_brand : 0 !!}%" aria-valuenow="{!! $number_brand ? $number_brand : 0 !!}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-2">
                            <i class="fa fa-box"></i>
                        </div>
                        <div class="h4 mb-0">{!! $number_product ? $number_product : 0 !!}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Sản Phẩm</small>
                        <div class="progress progress-white progress-xs mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {!! $number_product ? $number_product : 0 !!}%" aria-valuenow="{!! $number_product ? $number_product : 0 !!}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-2">
                            <i class="fa fa-newspaper"></i>
                        </div>
                        <div class="h4 mb-0">{!! $number_news ? $number_news : 0 !!}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Tin Tức</small>
                        <div class="progress progress-white progress-xs mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {!! $number_news ? $number_news : 0 !!}%" aria-valuenow="{!! $number_news ? $number_news : 0 !!}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-2">
                            <i class="fa fa-video"></i>
                        </div>
                        <div class="h4 mb-0">{!! $number_video ? $number_video : 0 !!}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Videos</small>
                        <div class="progress progress-white progress-xs mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {!! $number_video ? $number_video : 0 !!}%" aria-valuenow="{!! $number_video ? $number_video : 0 !!}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-2">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="h4 mb-0">{!! $number_user ? $number_user : 0 !!}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Users</small>
                        <div class="progress progress-white progress-xs mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {!! $number_user ? $number_user : 0 !!}%" aria-valuenow="{!! $number_user ? $number_user : 0 !!}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-cyan">
                        <h4 class="card-title text-white my-0">Thống kê website</h4>
                    </div>
                    <div class="card-body">
                        <div class="wrap-selectdate mb-4">
                            <div class="row">
                                <div class="col-auto mr-auto">
                                    <button type="button" class="btn btn-primary " id="btn-week">Week</button>
                                </div>
                                <div class="col-auto ">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="input-daterange">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="" name="from" required>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">@</div>
                                                    </div>
                                                    <input type="text" class="form-control" value="" name="to" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-primary" id="btn-date" type="button">Apply</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end wrap select Date -->
                        <div class="wrap-chart">
                            @include('Admin::ajax.ajaxChart')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header bg-gray-400">
                        <h4 class="card-title text-white my-0">Khách Hàng</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>TÊN</th>
                                <th>EMAIL</th>
                                <th>ĐIỆN THOẠI</th>
                                <th>NGÀY TẠO</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($new_user))
                                @foreach($new_user as $item_new_user)
                                    <tr>
                                        <td><b>{!! $item_new_user->name !!}</b></td>
                                        <td><img src="{!! asset($item_new_user->img_url) !!}" class="img_responsive" style="max-width:50px" alt="{!! $item_new_user->name !!}"></td>
                                        <td><b>{!! number_format($item_new_user->price) !!}</b> Vnd</td>
                                        <td>{!! \Carbon\Carbon::parse($item_new_user->created_at)->format('d-m-Y') !!}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        @include("Admin::paginator.right",['paginator'=>$new_user]);
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4">Chưa có dữ liệu</td>
                                </tr>
                            @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header bg-gray-600">
                        <h4 class="card-title text-white my-0">Khuyến Mãi</h4>
                    </div>
                    <div class="card-body">
                        <div class="promotion-chart-wrapper">
                            <canvas id="promotion-chart"></canvas>
                            <script>
                            const ctx_promotion = document.getElementById('promotion-chart');

                            const pro_active = {
                                label: 'Khuyến mãi đang chạy',
                                data: {!! $j_promotion_active !!},
                                backgroundColor: 'rgba(0, 99, 132, 0.6)',
                                borderWidth: 0,
                                yAxisID: "y-axis-active"
                            }

                            const pro_deactive = {
                                label: 'Khuyến mãi đã ngưng',
                                data: {!! $j_promotion_deactive !!},
                                backgroundColor: 'rgba(99, 132, 0, 0.6)',
                                borderWidth: 0,
                                yAxisID: "y-axis-deactive"
                            }

                            var chartOptions = {
                                scales: {
                                    xAxes: [{
                                        barPercentage: 1,
                                        categoryPercentage: 0.6
                                    }],
                                    yAxes: [{
                                        id: "y-axis-active"
                                    }, {
                                        id: "y-axis-deactive"
                                    }]
                                }
                            };

                            const promotionData = {
                                labels: ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10", "T11", "T12"],
                                datasets: [pro_active, pro_deactive]
                            };
                            const myChart_promotion = new Chart(ctx_promotion, {
                                type: "bar",
                                data: promotionData,
                                options: chartOptions
                            });

                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!--  DATE PICKER -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function(){
            // DATETIME
            $('.input-daterange input').each(function() {
                $(this).datepicker({
                    maxDate: '0',
                    dateFormat: 'dd-mm-yy'
                });
            });
            // SET DATE
            $('#btn-date').click(function(){
                var from = $('input[name="from"]').val();
                var to = $('input[name="to"]').val();
                $.ajax({
                     url: "",
                    data:{from: from, to: to, _token:$('meta[name="csrf-token"]').attr('content') },
                    type: 'GET',
                    beforeSend: function(){
                        $('#btn-date, #btn-week').prop('disabled', true);
                    },
                    success:function(data){
                        $('.wrap-chart').html(data);
                    },
                    complete: function(){
                        $('#btn-date, #btn-week').prop('disabled', false);
                    },
                    error:function(jqXHR, textStatus, errorThrown){
                        if(textStatus){
                            alert('Select date to get Data');
                        }
                    }
                })
            });
            // SET WEEK
            $('#btn-week').click(function(){
                var week = 7;
                $.ajax({
                    data:{week: week, _token:$('meta[name="csrf-token"]').attr('content') },
                    type: 'GET',
                    beforeSend: function(){
                        $('#btn-date, #btn-week').prop('disabled', true);
                    },
                    success:function(data){
                        $('.wrap-chart').html(data);
                    },
                    complete: function(){
                        $('#btn-date, #btn-week').prop('disabled', false);
                        $('.input-daterange input').each(function() {
                            $(this).datepicker("setDate", null);
                        });
                    }
                })
            })

        });
    </script>
@stop
