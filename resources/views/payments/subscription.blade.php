@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-body">
            <h3 class="title text-primary">Buy subscription</h3>
            <form method="POST" action="/subscription">
                @csrf
                <button  class="btn btn-primary btn-sm text-white">
                    Make payment
                </button>
            </form>
        </div>
    </div>
@endsection
