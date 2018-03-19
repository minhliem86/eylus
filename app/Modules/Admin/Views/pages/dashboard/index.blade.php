@extends('Admin::layouts.default')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-primary">
                <div class="card-body pb-0">
                    <h4 class="mb-0">{!! $total_pageviews !!}</h4>
                    <p>Pageviews</p>
                </div>
                <div class="chart-wrapper px-3" style="height:70px;">
                    <canvas id="card-chart1" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title text-uppercase">Traffic</h4>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-3">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <div class="d-flex">
                                    <input type="text" class="form-control datepick from_date" value="" name="from" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">To</span>
                                    </div>
                                    <input type="text" class="form-control datepick to_date" value="" name="to" disabled="" required>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-primary" id="btn-date" type="button">Apply</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <button type="button" class="btn btn-outline-success float-right" id="btn-week">Week</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="wrap-chart">
                                @include('Admin::ajax.ajaxChart')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <!--  DATE PICKER -->
    <link rel="stylesheet" href="{!! asset('public/assets/admin/js/plugins/datepicker/datepicker3.css') !!}">
    <script src="{!! asset('public/assets/admin/js/plugins/datepicker/bootstrap-datepicker.js') !!}"></script>

    <script>
        $(document).ready(function(){
            // DATETIME
            var date_start = $('.from_date').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
            }).on('changeDate', function(e){
                $('.to_date').datepicker({
                    format: 'dd/mm/yyyy',
                    startDate: e.date,
                    autoclose: true
                }).prop('disabled',false)
            });
            // SET DATE
            $('#btn-date').click(function(){
                var from = $('input[name="from"]').val();
                var to = $('input[name="to"]').val();
                $.ajax({
                    // url: "",
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
                $('.wrap-chart').empty();
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
                        $('.datepick').each(function() {
                            $(this).datepicker("setDate", null);
                        });
                    }
                })
            })

            //Cards with Charts
            var labels = [
                @foreach($data_analytic2 as $item_page)
                    "{!! $item_page['date'] !!}",
                @endforeach
            ];
            var data = {
                labels: labels,
                datasets: [
                    {
                        label: 'Pageviews',
                        borderColor: 'rgba(255,255,255,.55)',
                        data: [
                            @foreach($data_analytic2 as $item_page)
                                "{!! $item_page['pageviews'] !!}",
                            @endforeach
                        ]
                    },
                ]
            };
            var options = {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: 'transparent',
                            zeroLineColor: 'transparent'
                        },
                        ticks: {
                            fontSize: 2,
                            fontColor: 'transparent',
                        }

                    }],
                    yAxes: [{
                        display: false,
                        ticks: {
                            display: false,
                            min: Math.min.apply(Math, data.datasets[0].data) - 5,
                            max: Math.max.apply(Math, data.datasets[0].data) + 5,
                        }
                    }],
                },
                elements: {
                    line: {
                        borderWidth: 1
                    },
                    point: {
                        radius: 4,
                        hitRadius: 10,
                        hoverRadius: 4,
                    },
                }
            };
            var ctx2 = $('#card-chart1');
            var cardChart1 = new Chart(ctx2, {
                type: 'line',
                data: data,
                options: options
            });
        });
    </script>
@stop
