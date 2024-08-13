@extends('frontend.layouts.master')

@section('home')
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
    <link type="text/css" rel="stylesheet"
        href="https://cdn02.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.55595&themeRevisionID=6310a6ad592c72439615db25" />
    <style>
        .error {
            color: red;
        }

        body {
            background-color: #ffff;
        }
    </style>
    <section class="fp__breadcrumb" style="background: url('{{ asset('uploads/back.jpg') }}');">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>user dashboard</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="fp__dashboard mt_70 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="fp__dashboard_area">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                        @include('frontend.home.sidebar')
                    </div>

                    <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__dashboard_content">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="fp_dashboard_body">
                                    <div class="fp__dashoard_wishlist">
                                        <h3>To Be Evaluated</h3>
                                        <div id="smartwizard">
                                            <!-- Navigation -->
                                            <ul class="nav nav-progress">
                                                @foreach ($categories as $category)
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#step-{{ $loop->iteration }}">
                                                            <div class="num">{{ $loop->iteration }}</div>
                                                            Evaluation Phase
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <!-- Form Sections -->
                                            <div class="tab-content tab">
                                                @foreach ($categories as $category)
                                                    <div id="step-{{ $category->id }}" class="tab-pane" role="tabpanel" aria-labelledby="step-{{ $category->id }}">
                                                        <form class="evaluationForm" style="width: 100%;">
                                                            @csrf
                                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                            <input type="hidden" name="faculty_id" value="">
                                                            <input type="hidden" name="subject" value="{{ $subject }}">
                                                            <input type="hidden" name="schedule" value="{{ $schedule }}">

                                                            <div role="main" class="form-all">
                                                                <ul class="form-section page-section shadow">
                                                                    <li id="cid_1" class="form-input-wide" data-type="control_head">
                                                                        <div class="form-header-group header-large">
                                                                            <div class="header-text httac htvam">
                                                                                <h1 id="header_1" class="form-header" data-component="header">
                                                                                    {{ $category->title }}
                                                                                </h1>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    @php $counter = 1; @endphp
                                                                    @foreach ($questions->where('category_id', $category->id) as $index => $question)
                                                                        <li class="form-line" data-type="control_scale" id="id_{{ $question->id }}">
                                                                            <label class="form-label form-label-top form-label-auto" id="label_{{ $question->id }}" for="input_{{ $question->id }}" aria-hidden="false">
                                                                                {{ $counter }}. {{ $question->question }}
                                                                            </label>
                                                                            <div id="cid_{{ $question->id }}" class="form-input-wide" data-layout="full">
                                                                                <span class="form-sub-label-container" style="vertical-align: top">
                                                                                    <div role="radiogroup" aria-labelledby="label_{{ $question->id }} sublabel_input_{{ $question->id }}_description" cellPadding="4" cellSpacing="0" class="form-scale-table" data-component="scale">
                                                                                        <div class="rating-item-group">
                                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                                                <div class="rating-item">
                                                                                                    @if ($i == 1)
                                                                                                        <span class="rating-item-title for-from">
                                                                                                            <label for="input_{{ $question->id }}_worst" aria-hidden="true">Disagree</label>
                                                                                                        </span>
                                                                                                    @elseif ($i == 5)
                                                                                                        <span class="rating-item-title for-to">
                                                                                                            <label for="input_{{ $question->id }}_best" aria-hidden="true">Agree</label>
                                                                                                        </span>
                                                                                                    @endif
                                                                                                    <input type="radio" aria-describedby="label_{{ $question->id }}" class="form-radio" name="q{{ $category->id }}_{{ $question->id }}" value="{{ $i }}" title="{{ $i }}" id="input_{{ $question->id }}_{{ $i }}" required />
                                                                                                    <label for="input_{{ $question->id }}_{{ $i }}">{{ $i }}</label>
                                                                                                </div>
                                                                                            @endfor
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="form-sub-label" id="sublabel_input_{{ $question->id }}_description" style="border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; white-space: nowrap;">
                                                                                        1 is Disagree, 5 is Agree
                                                                                    </label>
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                        @php $counter++; @endphp
                                                                    @endforeach

                                                                    @if ($loop->last)
                                                                        <li class="form-line" data-type="control_button" id="id_2">
                                                                            <div id="cid_2" class="form-input-wide" data-layout="full">
                                                                                <div data-align="auto" class="form-buttons-wrapper form-buttons-auto jsTest-button-wrapperField">
                                                                                    <!-- Optional button can be placed here -->
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        {{-- <li class="form-line" data-type="control_textarea" id="id_24">
                                                                            <h2>Comment</h2>
                                                                            <label class="form-label form-label-top form-label-auto" id="label_24" for="input_24" aria-hidden="false">
                                                                                <span class="danger-span"><i class="fal fa-asterisk"></i> (Please be mindful of the words you use; it is recommended to use English language)</span>
                                                                            </label>
                                                                            <div id="cid_24" class="form-input-wide" data-layout="full">
                                                                                <textarea id="input_24" class="form-textarea custom-hint-group form-custom-hint" name="comment" style="width:648px;height:163px" data-component="textarea" aria-labelledby="label_24" data-customhint="Type here..." customhinted="true" placeholder="Type here..." spellcheck="false"></textarea>
                                                                            </div>
                                                                        </li> --}}
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Finish Button -->
                                            <button id="finishBtn" class="btn btn-primary" style="display: none;">Finish</button>

                                            <!-- Progress Bar -->
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mx-0 mx-sm-auto">
            <div class="modal-content">
                <div class="modal-header " style="background-color: var(--colorPrimary)">
                    <h5 class="modal-title text-white " id="exampleModalLabel"
                        style="background-color: var(--colorPrimary)">Feedback request</h5>

                </div>
                <div class="modal-body">
                    <div class="comment_input  wow fadeInUp" data-wow-duration="1s">
                        <h4>Leave A Comment</h4>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form class="feedbackForm">
                            <div class="row">
                                <input type="hidden" name="faculty_id" value="">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="subject" value="{{ $subject }}">
                                <input type="hidden" name="schedule" value="{{ $schedule }}">
                                <div class="col-xl-6 col-md-6">
                                    <label>Student ID</label>
                                    <div class="fp__contact_form_input">
                                        <span><i class="fal fa-user-alt"></i></span>
                                        <input type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <label>email</label>
                                    <div class="fp__contact_form_input">
                                        <span><i class="fal fa-user-alt"></i></span>
                                        <input type="email" placeholder="Mail">
                                    </div>
                                </div>
                                <div class="col-xl-12">

                                    <label>comment</label>
                                    <div class="fp__contact_form_input textarea">
                                        <span><i class="fal fa-user-alt"></i></span>
                                        <textarea name="comment" rows="5" placeholder="Your Comment"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary"
                        data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn  btn-primary"
                        style="background-color: var(--colorPrimary)">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function getFacultyIdFromUrl() {
            var url = window.location.href;
            var matches = url.match(/\/evaluate\/(\d+)/);
            if (matches && matches.length > 1) {
                return matches[1];
            } else {
                return null;
            }
        }








        $(document).ready(function() {
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                transition: {
                    animation: 'slideHorizontal'
                },
                toolbar: {
                    showNextButton: true,
                    showPreviousButton: true,
                    showSubmitButton: true,
                    position: 'bottom',
                    extraHtml: `<button class="read_btn submit_btn" id="btnFinish" disabled"><span id="btnText">Submit</span></button>`,
                },
                anchor: {
                    enableNavigation: true,
                    enableNavigationAlways: false,
                    enableDoneState: true,
                    markPreviousStepsAsDone: true,
                    unDoneOnBackNavigation: true,
                    enableDoneStateNavigation: true
                }
            });

            $('form').each(function() {
                $(this).validate({
                    errorPlacement: function(error, element) {
                        var formLine = element.closest('.form-line');
                        error.text("Please select an option.");
                        error.appendTo(formLine);
                    },
                    highlight: function(element) {
                        $(element).closest('.form-line').find('.form-radio').addClass('error');
                    },
                    unhighlight: function(element) {
                        $(element).closest('.form-line').find('.form-radio').removeClass(
                            'error');
                    },
                    messages: {
                        required: "Please select an option."
                    }
                });
            });

            // Validate form before moving to the next step
            $('#smartwizard').on('leaveStep', function(e, anchorObject, currentStepIndex, nextStepIndex,
                stepDirection) {
                var form = $('#smartwizard').find('.tab-pane:eq(' + currentStepIndex + ') form');
                if (stepDirection === 'forward' && form.length && !form.valid()) {
                    return false;
                }
                return true;
            });

            $('#smartwizard').on('showStep', function(e, anchorObject, stepIndex, direction, stepPosition) {
                var totalSteps = $('#smartwizard').smartWizard('getTotalSteps');
                if (stepIndex === totalSteps - 1) {
                    $('#smartwizard').smartWizard("disableButton", 'next');
                } else {
                    $('#smartwizard').smartWizard("enableButton", 'next');
                }
                let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
                $("#sw-current-step").text(stepInfo.currentStep + 1);
                $("#sw-total-step").text(stepInfo.totalSteps);

                if (stepPosition == 'last') {
                    $("#btnFinish").prop('disabled', false);
                } else {
                    $("#btnFinish").prop('disabled', true);
                }
            });

            $('#finishBtn').on('click', function() {
                alert('Form completed!');
                // You can submit the form here if needed
                // $('form').submit();
            });
        });

        $('body').on('click', '.submit_btn', function(e) {
            e.preventDefault();

            var facultyId = getFacultyIdFromUrl();
            if (!facultyId) {
                alert('Error: Faculty ID not found in URL');
                return;
            }

            $('input[name="faculty_id"]').val(facultyId);
            var subject = $('input[name="subject"]').val();
            var schedule = $('input[name="schedule"]').val();

            var formData = $('.evaluationForm').serialize();
            formData += '&subject=' + subject;
            Swal.fire({
                title: 'Are you sure?',
                text: "Please review your form before submitting!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#025043',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('user.evaluation-submit') }}",
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            if (response.status === 'success') {
                                Swal.fire(
                                    'Submitted!',
                                    response.message,
                                    'success',

                                ).then(() => {

                                    $('#exampleModal').modal({
                                        backdrop: 'static',
                                        keyboard: false
                                    }).modal('show');
                                })

                            } else if (response.status === 'error') {
                                Swal.fire(
                                    'Something wen\'t wrong!',
                                    response.message,
                                    'error'
                                );
                            }

                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                }
            });
        });

        $('#exampleModal .btn-primary').on('click', function() {
            window.location.href = "{{ route('user.evaluation-success') }}";

            var facultyId = getFacultyIdFromUrl();
            if (!facultyId) {
                alert('Error: Faculty ID not found in URL');
                return;
            }
            $('input[name="faculty_id"]').val(facultyId);
            var formData = $('.feedbackForm').serialize();
            $.ajax({
                url: "{{ route('user.feedback-success') }}",
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {

                },
                error: function(xhr) {
                    alert(xhr.responseText);
                }
            })
        });
    </script>
@endpush
