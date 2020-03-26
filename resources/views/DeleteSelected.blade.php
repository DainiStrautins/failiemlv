@extends('layouts.delete_form')
@section('body')
    <form method="POST" action="{{route('commit', ['id' => $offer->id])}}">
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
                <a href="/allrecords"> <input type="button" value="Go Back" class="btn btn-primary"/> </a>
            </div>
        </div>

    </form>
@endsection

