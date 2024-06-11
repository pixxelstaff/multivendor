var A_chart = {
    series: [{
        name: 'series1',
        data: [31, 40, 28, 51, 42, 109, 100],
        color: '#FF9900'
    }],
    chart: {
        height: 400,
        type: 'area',
        toolbar: false

    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    },
};

var areaChart = new ApexCharts(document.querySelector("#areaChart"), A_chart);
areaChart.render();