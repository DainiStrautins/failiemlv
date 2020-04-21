@extends('layouts.delete_form')
@section('body')
    <form method="POST" action="{{route('AdminDelete', ['id' => $users->id])}}">
        @csrf
        <div class="form-group">
            <h1>{{$users->name}}</h1>
        </div>
        <div class="form-group">
            <h1>{{$users->created_at}}</h1>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary"/>
            <a href="/admin"> <input type="button" value="Go Back" class="btn btn-primary"/> </a>
        </div>
    </form>
@endsection

