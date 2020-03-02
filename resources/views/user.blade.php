@extends('layouts/app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="left" class="col-md-3">
            <form class="py-2" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <h1> <textarea class="form-control no-resize" rows="1">{{$date->file}} </textarea></h1>
                    <h1 class="editable_field_text"></h1>
                    All your files deletes at: {{ $date->created_at->addMonths(3)->toDateString() }}
                    <i class="fa fa-question-circle btn btn-small btn-outline-primary"
                      aria-hidden="true"
                      data-rel="popover"
                      title="<strong>Attention</strong>"
                      data-content="<p class='text-body text-center'>Every time you upload a new file, your file experation on this folder extends</p> <p class='text-body text-center'> (3 Months + latest file, {{  $date->created_at->addMonths(3)->toDateString()}}) </p>" data-placement="top">
                    </i>
                    <ul>
                        <i class="fa fa-user-o" aria-hidden="true"></i> {{ $date->uploader->name }}<br/>
                        <i class="fa fa-files-o" aria-hidden="true"></i> {{ $count }} <br/>
                        <i class="fa fa-pie-chart" aria-hidden="true"></i> {{ HumanReadable::bytesToHuman($full_size) }}<br/>
                        <i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $date->created_at->toDateString() }}<br/>
                    </ul>
                <div class="after-upload mt-5">
                    <input type="submit" class="file btn btn-lg btn-outline-primary btn-block rounded-pill">
                </div>
                <input class="upload-button hide-after mt-5" id="filename" type="file" multiple name="file[]" value=" Add your files now!"/>
            </form>
        </div>
        <div id="right" class="col-lg-9 col-sm-12 ">
            <div class="flex-container" >
                <div class="row">
                    @forelse($uploads as $upload)
                        <div class="col-xl-2 col-lg-4 col-sm-6 nopadding border border-secondary rounded bg-light">
                            <div class="mx-auto p-4 text-center" data-rel="popover" title="<strong>Your file details:</strong>"
                                 data-content="<p class='text-body  text-center'>{{ $upload->file}} </p>
                                   <p class='body-text text-center'>{{HumanReadable::bytesToHuman($upload->size)}}</p>
                                   <p class='body-text text-center'>Created at: {{$upload->created_at}}</p>
                                   <p class='body-text text-center'>Deleting inevitably: {{$upload->created_at->addDays(7)->toDateString()}}</p>" data-placement="top">
                                @if (pathinfo($upload->file, PATHINFO_EXTENSION) == 'jfif'
                                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpg'
                                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpeg'
                                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'png'
                                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'gif')
                                    <img  class="img-fluid mx-auto d-block rounded-circle" style="height: 50px; width:50px;" src="{{ asset('public/files/'.$upload->file)}}">
                                @else
                                    <img  class="img-fluid mx-auto d-block" style="height: 45px; width:30px;" src="https://i.pinimg.com/originals/d0/78/22/d078228e50c848f289e39872dcadf49d.png" >
                                @endif
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
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
@endsection
