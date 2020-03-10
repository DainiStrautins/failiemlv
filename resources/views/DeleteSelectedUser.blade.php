@extends('layouts.delete_form')
@section('body')
    <form method="POST" action="{{route('commituser', ['id' => $offer->id])}}">
        @csrf
        <div class="col-lg-6 float-left">
            <div class="form-group">
                <h1>{{$offer->file}}</h1>
            </div>
            <div class="form-group">
                <h1>{{HumanReadable::bytesToHuman($offer->size)}}</h1>
            </div>
            <div class="form-group">
                <h1>{{$offer->created_at}}</h1>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary"/>

                <a href="/user"> <input type="button" value="Go Back" class="btn btn-primary"/> </a>
            </div>
        </div>
        <div class="col-lg-6 float-right">
            @if (pathinfo($offer->file, PATHINFO_EXTENSION) == 'jfif'
                                or pathinfo($offer->file, PATHINFO_EXTENSION) == 'jpg'
                                or pathinfo($offer->file, PATHINFO_EXTENSION) == 'jpeg'
                                or pathinfo($offer->file, PATHINFO_EXTENSION) == 'png'
                                or pathinfo($offer->file, PATHINFO_EXTENSION) == 'gif')
                <img  class="img-fluid" src="{{ asset('storage/files/'.$offer->file)}}">
            @endif
        </div>
    </form>
@endsection

