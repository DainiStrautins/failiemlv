@extends('layouts.body')

@section('inside')
    <div class="row">
        <div class="col-lg-12">
            <h3 align="center" class="my-4">
                Edit the lunch menu
            </h3>


            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{Session::get('success')}}</p>
                </div>
            @endif
            <!-- vienmērt izmantot route šādi bez / (skatīt web.php) -->
            <form method="POST" action="{{route('update', ['id' => $offer->id])}}">
                @csrf

                <div class="form-group">
                    <input type="text" name="slug" class="form-control" value="{{$offer->file}}"/>
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary"/>

                    <a href="/edit" class="btn btn-primary"> Go back</a>
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

