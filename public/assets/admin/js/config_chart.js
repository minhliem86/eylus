function chart_pageview( j_date, j_visitor, j_pageview){
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: j_date,
        datasets:[
                {
                        label: 'Visitors',
                        data: j_visitor,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255,99,132,1)'
                },
                {
                    label: 'Pageviews',
                    data: j_pageview,
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
}