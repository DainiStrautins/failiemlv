<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/theme.js') }}" defer></script>
    <link href="{{ asset('css/navigation.css') }}" rel="stylesheet">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
@include('page.nav-bar')
<main class="content">
    <form id="file-upload-form" class="uploader" action="" method="post" enctype="multipart/form-data">
        @csrf
    <div class="center">

        <div class="hide-after">
          <h2>File Upload</h2>
            <p class="lead">Register <b>Uploading your files</b></p>
            <!-- Upload  -->
            <input id="file-upload" type="file" multiple name="file[]"/>
            <label for="file-upload" id="file-drag">
                <div id="start">
                    <i class="fa fa-download" aria-hidden="true"></i>
                    <div>Select a file or drag here</div>
                    <div id="notimage" class="hidden">Please select an image</div>
                    <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                </div>
                <div id="response" class="hidden">
                    <div id="messages"></div>
                    <progress class="progress" id="file-progress" value="0">
                        <span>0</span>%
                    </progress>
                </div>
            </label>
        </div>
    </div>
        <div class="after-upload">
            <h2> Your files will be stored after uploading!</h2>
            @guest
                <p class="lead">Dont forget to register first!</p>
            @endguest
            @auth
                <p>You are ready to upload your files!</p>
            @endauth
            <input class="add-button" type="file" id="file" name="file[]" multiple />
            <button type="submit" class="btn btn-primary">
                Upload your files now!
            </button>
            <output class="col-lg-12 text-let" id="list"></output>
        </div>
    </form>
</main>
<script type="text/javascript" src="{{ URL::asset('js/main_page.js') }}"></script>
</body>
</html>
