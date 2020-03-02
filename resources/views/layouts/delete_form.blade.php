@extends('layouts.body')
@section('inside')
    <div class="row">
        <div class="col-lg-12">
            <h3 align="center" class="my-4">
                Are you sure u want to remove this record?
            </h3>
            @yield('body')
        </div>
    </div>
@endsection
