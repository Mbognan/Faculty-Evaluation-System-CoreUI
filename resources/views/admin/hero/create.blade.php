@extends('admin.layouts.master')
<style>
        <style>
            .profile-social a {
                font-size: 16px;
                margin: 0 10px;
                color: #999;
            }

            .profile-social a:hover {
                color: #485b6f;
            }

            .profile-stat-count {
                font-size: 22px
            }

            #image-preview {
                width: 200px;
                height: 200px;
                position: relative;
                overflow: hidden;
                background-color: #ffffff;
                color: #ecf0f1;
                margin: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                border: 2px solid #9da5b1;

            }

            #image-preview input {
                line-height: 100px;
                font-size: 100px;
                position: absolute;
                opacity: 0;
                z-index: 10;
            }


            #image-preview {
                width: 600px;
                height: 300px;
                position: relative;
                overflow: hidden;
                background-color: #ffffff;
                color: #ecf0f1;
                margin: auto;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            #image-preview label {
                position: absolute;
                z-index: 5;
                opacity: 0.8;
                cursor: pointer;
                background-color: #3498db;
                width: 230px;
                height: 50px;
                font-size: 20px;
                line-height: 50px;
                text-transform: uppercase;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
            }

        </style>
</style>
@section('contents')

<div class="fs-2 fw-semibold">Sections</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">
        <!-- if breadcrumb is single--><span>Section</span>
      </li>
      <li class="breadcrumb-item active"><span> Hero Create</span></li>
    </ol>
  </nav>
  <hr>

<div class="container mb-4">
    <div class="card mt-4 mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Manage Hero Section</span>

        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.hero.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div id="image-preview" class="avatar-preview mb-3">
                                <label for="image-upload" id="image-label">Choose Background</label>
                                <input type="file" name="background" id="image-upload"  />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="....">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="subtitle" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-info text-white">Upload Hero Section</button>
                      </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    (function($) {
        $.extend({
            uploadPreview: function(options) {
                var settings = $.extend({
                    input_field: ".image-input",
                    preview_box: ".image-preview",
                    label_field: ".image-label",
                    label_default: "Choose File",
                    label_selected: "Change File",
                    no_label: false,
                    success_callback: null,
                }, options);


                // Check if FileReader is available
                if (window.File && window.FileList && window.FileReader) {
                    if (typeof($(settings.input_field)) !== 'undefined' && $(settings.input_field) !==
                        null) {
                        $(settings.input_field).change(function() {
                            var files = this.files;

                            if (files.length > 0) {
                                var file = files[0];
                                var reader = new FileReader();

                                // Load file
                                reader.addEventListener("load", function(event) {
                                    var loadedFile = event.target;

                                    // Check format
                                    if (file.type.match('image')) {
                                        // Image
                                        $(settings.preview_box).css("background-image",
                                            "url(" + loadedFile.result + ")");
                                        $(settings.preview_box).css("background-size",
                                            "cover");
                                        $(settings.preview_box).css(
                                            "background-position", "center center");
                                    } else if (file.type.match('audio')) {
                                        // Audio
                                        $(settings.preview_box).html(
                                            "<audio controls><source src='" +
                                            loadedFile.result + "' type='" + file
                                            .type +
                                            "' />Your browser does not support the audio element.</audio>"
                                        );
                                    } else {
                                        alert("This file type is not supported yet.");
                                    }
                                });

                                if (settings.no_label == false) {
                                    // Change label
                                    $(settings.label_field).html(settings.label_selected);
                                }

                                // Read the file
                                reader.readAsDataURL(file);

                                // Success callback function call
                                if (settings.success_callback) {
                                    settings.success_callback();
                                }
                            } else {
                                if (settings.no_label == false) {
                                    // Change label
                                    $(settings.label_field).html(settings.label_default);
                                }

                                // Clear background
                                $(settings.preview_box).css("background-image", "none");

                                // Remove Audio
                                $(settings.preview_box + " audio").remove();
                            }
                        });
                    }
                } else {
                    alert("You need a browser with file reader support, to use this form properly.");
                    return false;
                }
            }
        });
    })(jQuery);

    $(document).ready(function() {
        let avatarUri = ""
        $('.avatar-preview').css({
            'background-image': 'url(' + avatarUri + ')',
            'background-size': 'cover',
            'background-position': 'center center'
        });
    });

    $(document).ready(function() {
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose Background", // Default: Choose File
            label_selected: "Change Background", // Default: Change File
            no_label: false // Default: false
        });

    });
</script>
@endpush
