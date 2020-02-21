@extends('layouts.body')
@section('inside')
    <h1 class="text-center py-4">Admin panel</h1>
    <div class="row">

    @forelse ($uploads as $upload)

            <div class="col-lg-4">
            <div class="card my-2 mx-2" style="width: 15rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$upload->user_id}}'s users file</h5>
                    @if (pathinfo($upload->file, PATHINFO_EXTENSION) == 'jfif'
                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpg'
                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpeg'
                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'png'
                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'gif') <img  class="img-fluid mx-auto d-block" style="height: 50px; width:50px;" src="{{ asset('/files/'.$upload->file)}}"> @else <img  class="img-fluid mx-auto d-block" style="height: 45px; width:30px;" src="https://i.pinimg.com/originals/d0/78/22/d078228e50c848f289e39872dcadf49d.png"> <p class="card-text">{{ $upload->file}}</p> @endif
                    <p class="card-text">{{$upload->created_at}}</p>
                    <p class="card-text">{{$upload->size}}</p>
                    <a class="btn btn-outline-danger btn-sm col-lg" href="allrecords/delete/{{ $upload->id }}">Delete </a>
                </div>
            </div>
            </div>
        @empty
            <div class="card-body text-center">
                Sorry, there are no records!
            </div>
    @endforelse

    </div>
@endsection
