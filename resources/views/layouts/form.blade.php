@extends('layouts.app')
@section('content')
<div class="deep-blue-gradient mh-100">
    <div class="container-fluid mh-100">
        <div class="row justify-content-center mh-100">
            <div class="col-lg-5 col-md-7 col-sm-10 center top">
                <div class="card">
                    <div class="card-body">
                        @yield('body')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
