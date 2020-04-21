@extends('layouts/app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="left" class="col-md-3">
                <form class="py-2" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul>
                        <i class="fa fa-files-o" aria-hidden="true"></i> {{ $count }} <br/>
                        <i class="fa fa-pie-chart" aria-hidden="true"></i> {{ HumanReadable::bytesToHuman($full_size) }}<br/>
                    </ul>
                    <div class="after-upload">
                        <input type="submit" class="file btn btn-lg btn-outline-primary btn-block rounded-pill">
                    </div>
                    <div class="custom-file hide-after">
                        <input type="file" class="custom-file-input" id="filename" multiple name="file[]">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </form>
            </div>
            <div id="right" class="col-lg-9 col-sm-12 ">
                <div class="flex-container">
                    <div class="row">
                        @forelse($uploads as $upload)
                            <div class="col-xl-2 col-lg-4 col-sm-6 border border-secondary bg-light">
                                <div class="mx-auto p-4 checkbox text-center" data-rel="popover" title="<strong>{{ $upload->uploader->name}}'s ({{ $upload->uploader->id }}) file details:</strong>"
                                         data-content="<p class='text-body  text-center'>{{ $upload->file}} </p>
                                                    <p class='body-text text-center'>{{HumanReadable::bytesToHuman($upload->size)}}</p>
                                                    <p class='body-text text-center'>{{$upload->created_at}}</p>" data-placement="top">
                                    @if (pathinfo($upload->file, PATHINFO_EXTENSION) == 'jfif'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpg'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpeg'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'png'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'gif')
                                        <img  class="img-fluid mx-auto d-block rounded-circle" style="height: 50px; width:50px;" src="{{ asset('storage/files/'.$upload->uploader->name.'/'.$upload->uploader->id.'/'.$upload->file) }}">
                                    @else <img  class="img-fluid mx-auto d-block" style="height: 45px; width:30px;" src="https://i.pinimg.com/originals/d0/78/22/d078228e50c848f289e39872dcadf49d.png" > @endif
                                        <div class="my-3">
                                            <a class="text-danger bottom-center" href="allrecords/delete/{{ $upload->id }}"><i class="fa fa-minus-square" aria-hidden="true"></i> </a>
                                        </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                Sorry, you do not have any uploads!
                            </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
@endsection
