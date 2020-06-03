@extends('layouts.app')
@section('content')
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>-->

    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid pt-2">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow">
                    <div class="bg-primary py-4">
                        <h6 class="m-0 font-weight-bold text-white text-center">Upload Count each month</h6></div>
                    <div class="card-body p-5">
                        <div class="col-lg-12 h-100">
                                {!! $chart->container() !!}
                        </div>
                        <div class="card-footer small text-muted p-4"> {{today()->diffForHumans()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    {!! $chart->script() !!}
@endsection
