@extends('layouts.delete_form')
@section('body')
    <form method="POST" action="{{route('commituser', ['id' => $upload->id])}}">
        @csrf
        <div class="col-lg-6 float-left">
            <div class="form-group">
                <h1>{{$upload->file}}</h1>
            </div>
            <div class="form-group">
                <h1>{{HumanReadable::bytesToHuman($upload->size)}}</h1>
            </div>
            <div class="form-group">
                <h1>{{$upload->created_at}}</h1>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary"/>
                <a href="/user"> <input type="button" value="Go Back" class="btn btn-primary"/> </a>
            </div>
        </div>
        <div class="col-lg-6 float-right">
            @if (pathinfo($upload->file, PATHINFO_EXTENSION) == 'jfif'
                                or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpg'
                                or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpeg'
                                or pathinfo($upload->file, PATHINFO_EXTENSION) == 'png'
                                or pathinfo($upload->file, PATHINFO_EXTENSION) == 'gif')
                <img  class="img-fluid" src="{{ asset('storage/files/'.auth()->user()->name.'/'.auth()->user()->id.'/'.$upload->file) }}">
            @endif
        </div>
    </form>
@endsection

