@extends('admin.layouts.master')
@section('breadcrumbs')
<div class="fs-2 fw-semibold"><a href="#"><i class="fas fa-arrow-left"></i></a></div>
<div class="fs-2 fw-semibold">Create Faculty</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">
        <!-- if breadcrumb is single--><span>Home</span>
      </li>
      <li class="breadcrumb-item active"><span>Faculty</span></li>
    </ol>
  </nav>
  <hr>
@endsection
@section('contents')
<div class="fs-2 fw-semibold"><a href="#"><i class="fas fa-arrow-left"></i></a></div>
<div class="fs-2 fw-semibold">Create Faculty</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">
        <!-- if breadcrumb is single--><span>Home</span>
      </li>
      <li class="breadcrumb-item active"><span>Faculty</span></li>
    </ol>
  </nav>
<hr>


        <div class="card mb-4">
            <div class="card-header "><strong>Faculty Account</strong><span class="small ms-1 text-danger">*</span>
            </div>
            <div class="card-body">

                    @csrf

                    <form class="row g-3">


                                <div class="form-group">
                                    <div id="image-preview" class="avatar-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="avatar" id="image-upload" />
                                        <input type="hidden" name="oldAvatar" value="">
                                    </div>
                                </div>

                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                          <label for="inputPassword4" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-12">
                          <label for="inputAddress" class="form-label">Email</label>
                          <input type="email" class="form-control" id="inputAddress" placeholder="example@gmail.com">
                        </div>
                        <div class="col-6">
                          <label for="inputAddress2" class="form-label">Password</label>
                          <input type="password" class="form-control" id="inputAddress2" placeholder="*******">
                        </div>
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label">Confirm Password</label>
                          <input type="password" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Gender</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="2">Male</option>
                                <option value="3">Female</option>
                              </select>
                          </div>
                          <div class="col-md-6">
                            <label for="inputCity" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="2">Enable</option>
                                <option value="3">Disable</option>
                              </select>
                          </div>


                      </form>


            </div>
        </div>

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

        To center the upload preview within its container,
        you can update the CSS for the #image-preview and #image-preview label as follows: css Copy code #image-preview {
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
        }

        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 100px;
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
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false // Default: false
        });

    });
</script>
@endpush
