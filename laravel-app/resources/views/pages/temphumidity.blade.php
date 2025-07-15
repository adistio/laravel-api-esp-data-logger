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
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
<script>
    const sensor_chart_options = {
        series: [{
                name: 'Temperature (°C)',
                data: [26.5, 27.2, 28.1, 29.0, 30.2, 29.8, 28.4]
            },
            {
                name: 'Humidity (%)',
                data: [55, 58, 60, 62, 65, 63, 59]
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
            show: true
        },
        colors: ['#ff5733', '#3498db'], // Adjust as needed
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'datetime',
            categories: [
                '2025-07-01',
                '2025-07-02',
                '2025-07-03',
                '2025-07-04',
                '2025-07-05',
                '2025-07-06',
                '2025-07-07'
            ]
        },
        tooltip: {
            x: {
                format: 'dd MMM yyyy'
            }
        }
    }

    const sensor_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sensor_chart_options
    )
    sensor_chart.render()
</script>
@endsection