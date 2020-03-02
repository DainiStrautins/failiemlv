@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
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
