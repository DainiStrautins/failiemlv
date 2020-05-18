@extends('layouts.dash_board')
@section('body')
    <h3 align="center" class="my-4">
        Are you sure u want to remove this record?
    </h3>
    <form method="POST" action="{{route('commit', ['id' => $upload->id])}}">
        @csrf
        <div class="col-lg-6 float-left">
            <div class="form-group">
               <h1>{{$upload->file}}</h1>
            </div>
            <div class="form-group">
                <h1>{{HumanReadable::bytesToHuman($upload->size)}}</h1>
            </div>
            <div class="form-group">
                <h1>{{$upload->created_at->diffForHumans()}}</h1>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary"/>
                <a href="/allrecords"> <input type="button" value="Go Back" class="btn btn-primary"/> </a>
            </div>
        </div>
    </form>
@endsection

