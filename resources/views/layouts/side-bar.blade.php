@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="left" class="col-md-3">
                <form class="py-2" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="upload_info">

                            <h1 class="editable_field_text">download.jfif</h1>

                       Deletes at:
                        <ul>
                                <li>
                                    <span class="upload_info_details_text">1</span>
                                </li>
                                <li>
                                    <span class="upload_info_details_text">9.79&nbsp;KB</span>
                                </li>
                                <li>
                                    <span class="upload_info_details_text">Feb 14, 2020</span>
                                </li>
                                <li>
                                    <span class="upload_info_details_text">3</span>
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
                                Saglabāt            		</div>
                        </div>
                    <div class="after-upload mt-5">
                        <button type="submit" class="file btn btn-lg btn-outline-primary btn-block rounded-pill">
                            Upload your files now!
                        </button>
                    </div>
                    <input class="upload-button hide-after mt-5" id="filename" type="file" multiple name="file[]"/>
                </form>
            </div>
            @yield('body')
        </div>
    </div>
@endsection
