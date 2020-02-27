@extends('layouts/app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="left" class="col-md-3">
            <form class="py-2" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="upload_info">
                    <h1 class="editable_field_text"></h1>
                    All your files deletes at: {{ $date->created_at->addDays(14)->toDateString() }}
                    <i class="fa fa-question-circle btn btn-small btn-outline-primary"
                      aria-hidden="true"
                      data-rel="popover"
                      title="<strong>Attention</strong>"
                      data-content="<p class='text-body text-center'>Every time you upload a new file, your file experation on this folder extends</p> <p class='text-body text-center'> (14 days + latest file, {{  $date->created_at->addDays(14)->toDateString()}}) </p>" data-placement="top">
                    </i>

                    <ul>
                        <li>
                            <span class="upload_info_details_text">File count: {{ $count }}</span>
                        </li>
                        <li>
                            <span class="upload_info_details_text">File size: </span>
                        </li>
                    </ul>
                    <div id="upload_info_image">
                    </div>
                </div>
                <div id="upload_description_edit" class="editable_field_wrapper">
                    <div class="editable_field_text">

                    </div>
                    <div class="editable_field_error_msg"></div>
                    <textarea class="editable_field_textarea" rows="1"></textarea>
                    <div class="editable_field_edit_button">
                        <div class="editable_field_edit_button_text">
                            <i class="fa fa-edit"></i>
                            <span>Pievienot mapes aprakstu</span>
                        </div>
                    </div>
                    <div class="editable_field_save_button">
                        <i class="fa fa-floppy-o"></i>
                        Saglabāt
                    </div>
                </div>
                <div class="after-upload mt-5">
                    <button type="submit" class="file btn btn-lg btn-outline-primary btn-block rounded-pill">
                        Upload your files now!
                    </button>
                </div>
                <input class="upload-button hide-after mt-5" id="filename" type="file" multiple name="file[]"/>
            </form>
        </div>
        <div id="right" class="col-lg-9 col-sm-12 ">
            <div class="flex-container" >
                <div class="row">
                    @forelse($uploads as $upload)
                        <div class="col-xl-2 col-lg-4 col-sm-6 nopadding border border-secondary rounded bg-light">
                            <div class="mx-auto p-4 text-center" data-rel="popover" title="<strong>Your file details:</strong>"
                                 data-content="<p class='text-body  text-center'>{{ $upload->file}} </p>
                                   <p class='body-text text-center'>{{$upload->size}}</p>
                                   <p class='body-text text-center'>Created at: {{$upload->created_at}}</p>
                                   <p class='body-text text-center'>Deleting inevitably: {{$upload->created_at->addDays(7)->toDateString()}}</p>" data-placement="top">
                                @if (pathinfo($upload->file, PATHINFO_EXTENSION) == 'jfif'
                                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpg'
                                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpeg'
                                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'png'
                                    or pathinfo($upload->file, PATHINFO_EXTENSION) == 'gif')
                                    <img  class="img-fluid mx-auto d-block" style="height: 50px; width:50px;" src="{{ asset('public/files/'.$upload->file)}}">
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
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    </div>
</div>

@endsection
