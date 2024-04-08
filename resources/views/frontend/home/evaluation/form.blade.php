@extends('frontend.layouts.master')

<link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.52978&themeRevisionID=6310a6ad592c72439615db25" />

<style>
    .error{
        color: red;
    }
    .wizard-container {
        max-height: 600px; /* Adjust the height as needed */
        overflow-y: auto;
    }

</style>

@section('home')
<section class="mt-4">
    <div id="smartwizard">
        <ul class="nav nav-progress">
            @foreach ($categories as $category)
            <li class="nav-item">
                <a class="nav-link" href="#step-{{$loop->iteration }}">
                    <div class="num">{{ $loop->iteration }}</div>
                    Evaluation Phase
                </a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach ($categories as $category)
            <div id="step-{{ $category->id }}" class="tab-pane" role="tabpanel" aria-labelledby="step-{{ $category->id }}">
                <form>
                    <div role="main" class="form-all">
                        <ul class="form-section page-section">
                            <li id="cid_1" class="form-input-wide" data-type="control_head">
                                <div class="form-header-group header-large">
                                    <div class="header-text httac htvam">
                                        <h1 id="header_1" class="form-header" data-component="header">
                                            {{ $category->title }}
                                        </h1>
                                    </div>
                                </div>
                            </li>
                            @php
                            $counter = 1;
                            @endphp
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
                                                    <input type="radio" aria-describedby="label_{{ $question->id }}" class="form-radio" name="q{{ $question->id }}" value="{{ $i }}" title="{{ $i }}" id="input_{{ $question->id }}_{{ $i }}" required /><label for="input_{{ $question->id }}_{{ $i }}">{{ $i }}</label>
                                                </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <label class="form-sub-label" id="sublabel_input_{{ $question->id }}_description" style="border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; white-space: nowrap;">1 is Disagree, 5 is Agree</label>
                                    </span>
                                </div>
                            </li>
                            @php
                            $counter++;
                            @endphp
                            @endforeach


                        </ul>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
        <!-- Include optional progressbar HTML -->
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        // Initialize SmartWizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            transition: {
                animation: 'slideHorizontal'
            },
            toolbar: {
                showNextButton: true,
                showPreviousButton: true,
                position: 'bottom',
            },
            anchor: {
                enableNavigation: true,
                enableNavigationAlways: false,
                enableDoneState: true,
                markPreviousStepsAsDone: true,
                unDoneOnBackNavigation: true,
                enableDoneStateNavigation: true
            },
        });

        // Validate each form using jQuery Validate
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
                    $(element).closest('.form-line').find('.form-radio').removeClass('error');
                },
                // Custom message for required fields
                messages: {
                    required: "Please select an option."
                }
            });
        });

        // SmartWizard event handler to validate before moving to next step
        $('#smartwizard').on('leaveStep', function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
            var form = $('#smartwizard').find('.tab-pane:eq(' + currentStepIndex + ') form');
            if (form.valid() === false) {
                return false;
            }
            return true;
        });
    });
</script>
@endpush
