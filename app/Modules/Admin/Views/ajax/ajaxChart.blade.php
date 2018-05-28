<div class="chart-container">
    <canvas id="myChart"></canvas>
    <script src="{!! asset('public/assets/admin') !!}/js/Chart.js"></script>
    <script src="{!! asset('public/assets/admin') !!}/js/config_chart.js" ></script>
    <script defer>
        chart_pageview({!! $j_date !!}, {!! $j_visitor !!}, {!! $j_pageview !!} );
    </script>
</div>
