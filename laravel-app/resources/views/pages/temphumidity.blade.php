@extends('layouts.app')

@section('menu', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 connectedSortable">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Monitoring Temperature Humidity</h3>
            </div>
            <div class="card-body">
                <div id="revenue-chart"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptjs')
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script> ChartJS
<script>

    const sales_chart_options = {
        series: [{
                name: 'Digital Goods',
                data: [28, 48, 100, 19, 86, 27, 90]
            },
            {
                name: 'Electronics',
                data: [65, 59, 80, 81, 56, 55, 40]
            }
        ],
        chart: {
            height: 300,
            type: 'area',
            toolbar: {
                show: false
            }
        },
        legend: {
            show: false
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'datetime',
            categories: [
                '2023-01-01',
                '2023-02-01',
                '2023-03-01',
                '2023-04-01',
                '2023-05-01',
                '2023-06-01',
                '2023-07-01'
            ]
        },
        tooltip: {
            x: {
                format: 'MMMM yyyy'
            }
        }
    }

    const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options
    )
    sales_chart.render()
</script>
@endsection