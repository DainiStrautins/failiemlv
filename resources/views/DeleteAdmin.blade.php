@extends('layouts.dash_board')
@section('body')
    <h3 class="my-4 text-center">
        Are you sure u want to remove this record?
    </h3>
    <form method="POST" action="{{route('AdminDelete', ['id' => $users->id])}}">
        @csrf
        <div class="form-group">
            <h1>{{$users->name}}</h1>
        </div>
        <div class="form-group">
            <h1>{{$users->created_at->diffForHumans()}}</h1>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary"/>
            <a href="/admin"> <input type="button" value="Go Back" class="btn btn-primary"/> </a>
        </div>
    </form>
@endsection

