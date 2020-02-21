@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{Session::get('success')}}</p>
            </div>
        @endif
        <div id="landing-section">
            <div class="hide-after" id="title">Store, Share files</div>
            <form id="myform" class="py-2" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div id="drop_zone">

                    <div class="container-fluid after-upload pb-4">
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
                    </div>

                    <div class="col-md-7 col-sm-7 center pt-5 hide-after">
                        <div class="file btn btn-lg btn-danger btn-block rounded-pill border-danger main">

                            Upload your files
                            <i class="fa fa-cloud-upload"></i>
                            <input class="main" id="filename" type="file" multiple name="file[]"/>
                            @error('files')
                            <p class="text-danger pt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 center">
                        <button type="submit" class="file btn btn-lg btn-outline-primary btn-block rounded-pill border-primary main after-upload">
                            <i class="fa fa-angle-double-up"></i>
                            Upload your files now!
                        </button>
                    </div>
                    <div class="col-md-7 col-sm-7 center pt-3 after-upload">
                        <div class="file btn btn-lg btn-block rounded-pill btn-outline-secondary main">
                            <i class="fa fa-plus-circle"></i>
                            Add more
                            <input class="main" id="file" type="file" multiple name="file[]"/>
                        </div>
                    </div>
                    <p class="text-primary pt-3">Or Drop files here</p>


                    <output class="col-lg-12 " id="fullsize"></output>
                    <output class="col-lg-12 " id="list"></output>
                    <output class="col-lg-12 " id="output"></output>

                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript">

        function _(el) {
            return document.getElementById(el);
        }

        function upload() {
            var file = _("file").files[0];
            var formdata = new FormData();
            formdata.append("file", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "file_upload.php");
            ajax.send(formdata);
        }

        function progressHandler(event) {
            _("loadedtotal").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
            var percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
            _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
        }

        function completeHandler(event) {
            _("status").innerHTML = event.target.responseText;
            _("progressBar").value = 0;
        }

        function errorHandler(event) {
            _("status").innerHTML = "Upload Failed";
        }

        function abortHandler(event) {
            _("status").innerHTML = "Upload Aborted";
        }
    </script>
@endsection
