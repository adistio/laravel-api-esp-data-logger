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