@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="landing-section" class="text-center">
            <form id="myform" class="py-2" action="" method="post" enctype="multipart/form-data">
                @csrf  <!--  cross-site request forgery -->
                <div id="drop_zone" class="py-5">
                    <!-- Main page -->
                    <div class="hide-after">
                        <div id="title">Store, Share Files</div>
                        <div class="col-md-7 col-sm-7 mx-auto pt-3">
                            <input class="upload-button mt-3" id="filename" type="file" required multiple name="file[]"/>
                            @error('file')
                            <p class="text-danger pt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!--This form will only show after person has submitted a file/s-->
                    <div class="after-upload">
                        <h1> Your files will be stored after uploading!</h1>
                        @guest
                            <p>Dont forget to register first!</p>
                        @endguest
                        @auth
                            <p>You are ready to upload your files!</p>
                        @endauth

                        <div class="col-md-7 col-sm-7 mx-auto pt-3 ">
                            <input class="add-button" type="file" id="filename" name="file[]" multiple />
                        </div>
                        <div class="col-md-8 col-sm-8 my-3 mx-auto">
                            <button type="submit" class="file btn btn-lg btn-outline-primary btn-block rounded-pill border-primary">
                                Upload your files now!
                            </button>
                        </div>
                        <output class="col-lg-12 text-let px-0" id="list">
                        </output>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/numbers.js') }}"></script>
@endsection
