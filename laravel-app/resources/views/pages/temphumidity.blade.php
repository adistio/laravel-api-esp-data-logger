@extends('layouts.app')

@section('menu', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 connectedSortable">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Data Temperature Humidity</h3>
                <br>
                <div style="display: flex; gap: 10px; max-width: 600px;">
                    <input type="date" id="filter-date" class="form-control">
                    <input type="time" id="filter-start-time" class="form-control">
                    <input type="time" id="filter-end-time" class="form-control">
                    <button id="btn-apply-filter" class="btn btn-primary">Apply</button>
                </div>
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
    let chartInstance = null;

    function fetchAndRenderChart(date = null, startTime = null, endTime = null) {
        let url = '/api/sensor-data';
        const params = new URLSearchParams();

        if (date) params.append('date', date);
        if (startTime) params.append('start_time', startTime);
        if (endTime) params.append('end_time', endTime);

        url += '?' + params.toString();

        fetch(url)
            .then(response => response.json())
            .then(data => {
                const options = {
                    series: [{
                            name: 'Temperature (°C)',
                            data: data.temperature
                        },
                        {
                            name: 'Humidity (%)',
                            data: data.humidity
                        }
                    ],
                    chart: {
                        type: 'area',
                        height: 300
                    },
                    xaxis: {
                        categories: data.times,
                        title: {
                            text: 'Time (Hour:Minute)'
                        }
                    },
                    stroke: {
                        curve: 'smooth'
                    }
                };

                if (chartInstance) {
                    chartInstance.updateOptions(options);
                } else {
                    chartInstance = new ApexCharts(document.querySelector('#revenue-chart'), options);
                    chartInstance.render();
                }
            });
    }

    // Initial load
    fetchAndRenderChart();

    // Apply filter
    document.getElementById('btn-apply-filter').addEventListener('click', function() {
        const date = document.getElementById('filter-date').value;
        const startTime = document.getElementById('filter-start-time').value;
        const endTime = document.getElementById('filter-end-time').value;

        fetchAndRenderChart(date, startTime, endTime);
    });
</script>
@endsection