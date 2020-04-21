@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="left" class="col-md-3">
                <form class="py-2" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @forelse($uploads as $upload)
                        @if($loop->last)
                    <i class="fa fa-question-circle btn btn-small btn-outline-primary text-center"
                       aria-hidden="true"
                       data-rel="popover"
                       title="<strong>Attention</strong>"
                       data-content="<p class='text-body text-center'>Each item that lifespan is longer than 7 days gets deleted!</p>" data-placement="top">
                    </i>
                        <ul>
                            <i class="fa fa-user-o" aria-hidden="true"></i> {{ auth()->user()->name }}<br/>
                            <i class="fa fa-files-o" aria-hidden="true"></i> {{ $count }} <br/>
                            <i class="fa fa-pie-chart" aria-hidden="true"></i> {{ HumanReadable::bytesToHuman($full_size) }}<br/>
                            <i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $date->created_at->toDateString() }}<br/>
                        </ul>
                        @endif
                    @empty

                    @endforelse
                    <div class="after-upload">
                        <input type="submit" class="file btn btn-lg btn-outline-primary btn-block rounded-pill">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input hide-after"  id="filename" multiple name="file[]" >
                        <label class="custom-file-label hide-after">Choose file</label>
                    </div>
                </form>
            </div>
            <div id="right" class="col-lg-9 col-sm-12">
                <div class="flex-container">
                    <div class="row">
                        @forelse($uploads as $upload)
                            <div class="col-xl-2 col-lg-4 col-sm-6 border border-secondary bg-light">
                                <div class="mx-auto p-3 text-center" data-rel="popover" title="<strong>Your file details:</strong>"
                                     data-content="<p class='text-body text-center'>{{ $upload->file}} </p>
                                   <p class='body-text text-center'>{{HumanReadable::bytesToHuman($upload->size)}}</p>
                                   <p class='body-text text-center'>Created at: {{$upload->created_at}}</p>
                                   <p class='body-text text-center'>Deleting inevitably: {{$upload->created_at->addDays(7)->toDateString()}}</p>" data-placement="top">
                                    @if (pathinfo($upload->file, PATHINFO_EXTENSION) == 'jfif'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpg'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpeg'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'png'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'gif')
                                        <img class="img-fluid mx-auto d-block rounded-circle" style="height: 50px; width:50px;" alt="{{$upload->file}}" src="{{ asset('storage/files/'.auth()->user()->name.'/'.auth()->user()->id.'/'.$upload->file) }}">
                                    @else
                                        <img class="img-fluid mx-auto d-block" alt="{{$upload->file}}" style="height: 45px; width:30px;" src="https://i.pinimg.com/originals/d0/78/22/d078228e50c848f289e39872dcadf49d.png" >
                                    @endif
                                    <div class="d-flex justify-content-center mt-4">
                                        <a class="text-success mr-3" href="user/download/{{ $upload->id }}"><i class="fa fa-download" aria-hidden="true"></i> </a>

                                        <a class="text-danger" href="user/delete/{{ $upload->id }}"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                Sorry, you do not have any uploads!
                            </div>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        {{ $uploads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
@endsection
