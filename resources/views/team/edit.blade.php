@extends('layouts.main')

@section('page_dependencies')
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

<!-- Begin page -->

@section('content')
    <div class="am-mainpanel row justify-content-center">
        <div class="am-pagebody col-md-10">

            <div class="card pd-20 pd-md-40 mg-t-50 ">
                <h6 class="card-body-title">Edit Teams</h6>

                <form id="edit-event-form" class="form-horizontal" action="{{ route('teams.update', $teams->id) }}">
                    @csrf
                    {{--                    @method('PUT')--}}

                    <div id="invalid-input-alert"></div>
                    <div id="success-alert"></div>

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <div class="col-xl-10">
                        <div class="row row-sm mg-t-20">
                            <div class="col-xl-12">
                                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">


                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Team name: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="name" value="{{ $teams->name ?? '' }}"
                                                   placeholder="Enter Team name">
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Event: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select class="form-control select2" name="event_id"
                                                    data-placeholder="Choose one">
                                                <option value="" selected>Select a Event...</option>
                                                @foreach($events as $event)
{{--                                                    <option value="{{ $event->id }}">{{ $event->name }}</option>--}}
                                                    <option value="{{ $event->id }}" {{ $event->id == $teams->event_id ? 'selected' : '' }}>
                                                        {{ $event->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div><!-- col-4 -->
                                    </div>
                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Nationality: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="nationality"
                                                   value="{{ $teams->nationality }}"
                                                   placeholder="Enter Nationality">
                                        </div>
                                    </div>

                                    <div class="row row-xs mg-t-30">
                                        <div class="col-lg-8 mg-l-auto">
                                            <div class="form-layout-footer d-flex justify-content-end">
                                                <button id="edit-event-btn" class="btn btn-info mg-r-5 ml-auto">Submit
                                                    Form
                                                </button>
                                                <button class="btn btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-layout-footer">
                                        <a href="{{ route('teams.index') }}" class="btn btn-primary mr-2">
                                            <i class="fa fa-arrow-left mg-r-10"></i>Back</a>
                                    </div>

                                </div><!-- card -->
                            </div><!-- col-6 -->
                        </div>
                    </div>
                </form>
            </div><!-- card -->

        </div><!-- am-pagebody -->

    </div><!-- am-mainpanel -->
@stop


@section('page_script')

    <script src="{{ asset('lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>

    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/ajax_calls.js') }}"></script>

    <script>
        $(function () {
            'use strict';
            // Datepicker
            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $('#edit-event-btn').on('click', function () {
                event.preventDefault();
                console.log('clicked')
                const form = $('#edit-event-form');
                let redirectUrl = '{{ route('teams.index') }}';
                let formMethod = 'PUT';
                handleAddEvent(form, redirectUrl, formMethod)
            });

        });

    </script>

@endsection

