@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">DashBoard</div>
                    <div class="card-body">
                        @yield('inside')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
