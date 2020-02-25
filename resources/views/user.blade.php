@extends('layouts.side-bar')
@section('body')
        @forelse($uploads as $upload)
                <div class="col-xl-2 col-lg-4 col-sm-6 nopadding border border-secondary rounded bg-light">
                    <div class="mx-auto p-4 text-center" data-rel="popover" title="<strong>Your file details:</strong>"
                          data-content="<p class='text-body  text-center'>{{ $upload->file}} </p>
                                    <p class='body-text text-center'>{{$upload->size}}</p>
                                    <p class='body-text text-center'>{{$upload->created_at}}</p>" data-placement="top">
                        @if (pathinfo($upload->file, PATHINFO_EXTENSION) == 'jfif'
                            or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpg'
                            or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpeg'
                            or pathinfo($upload->file, PATHINFO_EXTENSION) == 'png'
                            or pathinfo($upload->file, PATHINFO_EXTENSION) == 'gif')
                            <img  class="img-fluid mx-auto d-block" style="height: 50px; width:50px;" src="{{ asset('public/files/'.$upload->file)}}">
                    @else <img  class="img-fluid mx-auto d-block" style="height: 45px; width:30px;" src="https://i.pinimg.com/originals/d0/78/22/d078228e50c848f289e39872dcadf49d.png" > @endif
                            <div class="my-3">
                                <a class="text-danger bottom-center" href="user/delete/{{ $upload->id }}"><i class="fa fa-minus-square" aria-hidden="true"></i> </a>
                            </div>
                    </div>
                </div>
            @empty
            <div class="text-center">
                Sorry, you do not have any uploads!
            </div>
        @endforelse
@endsection
