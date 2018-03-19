<div class="chart-container">
    <canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    @foreach($data_analytic as $v)
                        "{!! $v['date'] !!}",
                    @endforeach
                ],
                datasets:[
                    {
                        label: 'Visitors',
                        data: [
                            @foreach($data_analytic as $item_visitor)
                                "{{$item_visitor['visitors']}}",
                            @endforeach
                        ],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255,99,132,1)'
                    },
                    {
                        label: 'Pageviews',
                        data: [
                            @foreach($data_analytic as $item_pageview)
                                "{{$item_pageview['pageviews']}}",
                            @endforeach
                        ],
                        backgroundColor: 'rgba(131, 173, 239, 0.2)',
                        borderColor: 'rgba(131, 173, 239, 1)'
                    }
                ],
            },
            options: {
                responsive: true,
                title:{
                    display: true,
                    text: 'Dữ liệu khách hàng truy cập website',
                    position: 'bottom'
                },
                legend :{
                    position: 'bottom'
                }
            }
        });
    </script>
</div>
