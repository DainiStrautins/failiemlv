@extends('layouts.app')
@section('content')
    <div class="container">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{Session::get('success')}}</p>
            </div>
        @endif
            <div id="landing-section" class="text-center">
                <form id="myform" class="py-2" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="drop_zone" class="p-4">

                        <!-- Main page -->
                        <div class="hide-after">
                            <div id="title">Store, Share Files</div>
                            <div class="col-md-7 col-sm-7 mx-auto pt-3 ">
                                <input class="upload-button" id="filename" type="file" multiple name="file[]"/>
                                @error('file')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <p class="text-primary pt-3">Or Drop files here</p>
                        </div>

                        <!--This form will only show after person has submitted a file/s-->
                        <div class="after-upload">
                            <h1> Your files have been stored!</h1>
                            @guest
                                <p>Access a link after registration</p>
                            @endguest
                            @auth
                                <p>Access and share your files trough this link: idk būs vēlāk, varbūt</p>
                            @endauth
                            <div class="form-group">
                                <input  type="email"  class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <input  type="email"  class="form-control" placeholder="Enter other emails to whom to send the link with your files">
                            </div>
                            <div class="row pb-2">
                                <div class="col-lg-3 text-left">
                                    <label for="exampleFormControlSelect1" class="pt-2 pl-3">  File access:</label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Anyone who has the site</option>
                                        <option>With password</option>
                                        <option>Only for me (secured)</option>
                                        <option>Published in my account</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 text-left">
                                    <label for="exampleFormControlSelect1" class="pt-2 pl-3"> Storage duration:</label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-control">
                                        <option>1 Day</option>
                                        <option>1 Week</option>
                                        <option>1 Month</option>
                                        <option>6 Months</option>
                                        <option>Permanently</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 mx-auto pt-3 ">
                                <input class="add-button" type="file" id="file" name="file[]" multiple />
                            </div>
                            <div class="col-md-8 col-sm-8 mt-3 mx-auto">
                                <button type="submit" class="file btn btn-lg btn-outline-primary btn-block rounded-pill border-primary">
                                    Upload your files now!
                                </button>
                            </div>
                            <output class="col-lg-12 " id="fullsize"></output>
                            <output class="col-lg-12 " id="list"></output>
                            <output class="col-lg-12 " id="output"></output>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
@endsection
