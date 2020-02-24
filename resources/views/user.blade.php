@extends('layouts.app')
@section('users')
    <div class="container-fluid">
        <div class="row">
            <div id="left" class="float-left col-lg-3">


                <div id="upload_info">

                    <div id="upload_name_edit" class="editable_field_wrapper">

                        <h1 class="editable_field_text">
                            download.jfif					</h1>

                        <div class="editable_field_error_msg"></div>
                        <textarea class="editable_field_textarea" rows="1">download.jfif</textarea>

                        <div class="editable_field_save_button">
                            <i class="fa fa-floppy-o"></i>
                            Saglabāt					</div>

                    </div>

                    <div id="upload_info__delete_warning">Tiks dzēsts: Feb 28, 2020</div>

                    <div id="upload_info_image_details">
                        <ul id="upload_info_details">
                            <li>
                                <span class="upload_info_details_text">nav norādīts</span>    					</li>
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

                    <div id="upload-info-button-container">
                        <a class="list_view__add_files_button upload-info-button filled half-button" onclick="logClick('ActionsAddFiles')" href="javascript:void(0)">
                            <i class="fal fa-plus-circle"></i>
                            Pievienot failus						</a>

                        <a class="upload-info-button filled half-button" style="float: right;" href="javascript:void(0)" onclick="logClick('ActionsDeleteFiles'); fConfirm('Vai tiešām vēlaties dzēst visus šīs mapes failus?', null, null, null, function(r){ if( r == true ){ deleteUpload('78jqaasd','fd108dd1'); } });">
                            <i class="fal fa-trash"></i>
                            Dzēst mapi						</a>

                        <!--
                        <div class="list-menu-divider">
                            <div class="divider-line-container">
                                <div class="divider-line">
                                    <span class="divider-line-contents"><i class="fa fa-key" aria-hidden="true"></i>Mapes piekļuves uzstādījumi</span>
                                </div>
                            </div>
                        </div>
                        -->

                        <a class="upload-info-button filled half-button " onclick="logClick('ActionsAddPassw');  showCreateAccount();" href="javascript:void(0)">
                            <i class="fal fa-key"></i>
                            Uzlikt paroli						</a>

                        <a class="upload-info-button filled half-button " href="javascript:void(0)" onclick="logClick('ActionsDontDownload'); showCreateAccount()" id="allow_download_text">
                            <i class="fal fa-ban"></i>
                            Liegt lejuplādi						</a>
                        <!-- JV:2019.10.28. no need. use "My files" filebrowser
                        <a class="upload-info-button transparent " href="javascript:void(0)" onclick="logClick('ActionsRemoveFromPublicProfile'); showCreateAccount()">
                            <img src="/images/folder_view/info_block/add_to_public.svg">
                            <span id="upload-info-button-add-to-public-catalog-text">Publicēt manā failu profilā</span>
                        </a>
                        -->
                        <a class="upload-info-button transparent " href="javascript:void(0)" onclick="logClick('ActionsAccessOnlyMe'); showCreateAccount()">
                            <i class="fa fa-lock"></i>
                            <span id="upload-info-button-access-only-me">Uzlikt privātu piekļuvi tikai sev</span>
                        </a>

                        <!-- JV:2019.10.28. No need. use "My files" filebrowser
                        <a class="upload-info-button transparent " href="javascript:void(0)" onclick="logClick('PropagateSettings');  showCreateAccount();">
                            <img src="/images/folder_view/info_block/inherit.svg">
                            <span id="upload-info-button-propagate-settings">Mantot visu apakšmapēm</span>
                        </a>
                        -->
                        <a href="javascript:void(0)" onclick="showEmbedUploadForm( { upload_hash: '78jqaasd', user: '', ihash: '' } )" class="upload-info-button transparent">
                            <i class="fa fa-code"></i>
                            Iekļaut mājas lapā						</a>
                    </div>
                </div>
                <div style="margin-top: 12px;">

                    <script type="text/javascript">
                        function reload_any_media_iframe_dfp_frame_dfp_15_1582554545 ()
                        {
                            if ($("#any_media_banner_dfp_15").length > 0)
                            {

                                jQuery("#dfp_frame_dfp_15_1582554545").attr("src", "/dfp/?w=300px&h=250px&mp=dfp_15&t" + Math.floor( Math.random() * (2000000 - 1000 + 1) ) + 1000);
                            }
                        }
                    </script>
                    <script type="text/javascript">
                        setInterval("reload_any_media_iframe_dfp_frame_dfp_15_1582554545 ()", 60000);
                    </script>			</div>
                <div style="margin-top: 20px;">
                    <!-- <iframe src="https://jauns.lv/widget/failiemlv-300x250-lv" width="300" height="250" frameborder="0" allowfullscreen></iframe> -->

                </div>
            </div>
            <div id="right" class="float-right col-lg-9">
                <div class="flex-container" >
                    <div class="row">
                        @forelse($uploads as $upload)
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Your file</h5>

                                        @if (pathinfo($upload->file, PATHINFO_EXTENSION) == 'jfif'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpg'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'jpeg'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'png'
                                        or pathinfo($upload->file, PATHINFO_EXTENSION) == 'gif') <img  class="img-fluid mx-auto d-block" style="height: 50px; width:50px;" src="{{ asset('/files/'.$upload->file)}}"> @else <img  class="img-fluid mx-auto d-block" style="height: 45px; width:30px;" src="https://i.pinimg.com/originals/d0/78/22/d078228e50c848f289e39872dcadf49d.png"> <p class="card-text">{{ $upload->file}}</p> @endif
                                        <p class="card-text">{{$upload->size}}</p>
                                        <p class="card-text">{{$upload->created_at}}</p>
                                         <a class="btn btn-outline-danger btn-sm col-lg" href="user/delete/{{ $upload->id }}">Delete </a>
                                    </div>
                                </div>

                            @empty
                            <div class="card-body text-center">
                                Sorry, you do not have any uploads!
                            </div>
                        @endforelse
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
