@extends('admin.layouts.master')

@section('breadcrumbs')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <!-- if breadcrumb is single--><span>Home</span>
                </li>
                <li class="breadcrumb-item active"><span>profile</span></li>
            </ol>
        </nav>
    </div>
@endsection

@section('contents')
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header "><strong>Personal Information</strong><span class="small ms-1 text-danger">*</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div id="image-preview" class="avatar-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="avatar" id="image-upload" />
                                    <input type="hidden" name="oldAvatar" value="{{ $user->avatar }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">First Name</label>
                            <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" placeholder="First name" aria-label="First name">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                            <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" placeholder="Last name" aria-label="Last name">
                        </div>

                    </div>
                    <div class="mb-3">

                        <label for="exampleFormControlInput1" class="form-label">Change Email address<span
                                class="small ms-1 text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" id="exampleFormControlInput1" placeholder="Email">
                    </div>



                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2" type="submit">Update</button>
                            </div>
                        </div>

                    </div>
                </form>
                </div>
            </div>

        </div>


        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header"><strong>Change Password</strong><span class="small ms-1 text-danger">*</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.password_reset') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="row">
                        <div class="col">
                        <label for="exampleFormControlInput1" class="form-label text-danger">Old Password</label>
                        <input type="password" name="current_password" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label text-danger">New Password </label>
                            <input type="password" name="password" class="form-control" placeholder="First name" aria-label="First name">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label text-danger">Confirm Password </label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Last name" aria-label="Last name">
                        </div>


                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-danger me-md-2 mt-3 text-light" type="submit">Change Password</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
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
                    let avatarUri = "{{ asset($user->avatar) }}"
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
                        label_default: "Choose File", // Default: Choose File
                        label_selected: "Change File", // Default: Change File
                        no_label: false // Default: false
                    });

                });


            </script>
        @endpush
    </div>
@endsection
