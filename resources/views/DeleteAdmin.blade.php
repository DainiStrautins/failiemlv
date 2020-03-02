@extends('layouts.body')

@section('inside')
    <div class="row">
        <div class="col-lg-12">
            <h3 align="center" class="my-4">
                Are you sure u want to remove this record?
            </h3>


            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{Session::get('success')}}</p>
                </div>
        @endif
        <!-- vienmērt izmantot route šādi bez / (skatīt web.php) -->
            <form method="POST" action="{{route('AdminDelete', ['id' => $offer->id])}}">
                @csrf

                <div class="form-group">
                    <h1>{{$offer->uploader->name}}</h1>
                </div>
                <div class="form-group">
                    <h1>{{$offer->created_at}}</h1>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary"/>

                    <a href="/admin"> <input type="button" value="Go Back" class="btn btn-primary"/> </a>
                </div>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection

