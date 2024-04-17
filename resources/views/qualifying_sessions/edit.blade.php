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

                <form id="edit-qualifying-form" class="form-horizontal" action="{{ route('qualifying-sessions.update', $qualifyingSessions->id) }}">
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
                                        <label class="col-sm-4 form-control-label">Qualifying Position: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="number" class="form-control" value="{{ $qualifyingSessions->qualifying_position ?? '' }}"
                                                   name="qualifying_position"
                                                   placeholder="Enter qualifying position ">
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Team: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select class="form-control select2" name="team_id" data-placeholder="Choose one">
                                                <option value="" selected>Select a Team...</option>
                                                @foreach($teams as $team)
                                                    <option value="{{ $team->id }}" {{ $team->id == $qualifyingSessions->team_id ? 'selected' : '' }}>
                                                        {{ $team->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div><!-- col-4 -->
                                    </div>
                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Driver: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select class="form-control select2" name="driver_id"
                                                    data-placeholder="Choose one">
                                                <option value="" selected>Select a Driver...</option>
                                                @foreach($drivers as $driver)
                                                    <option value="{{ $driver->id }}" {{ $driver->id == $qualifyingSessions->driver_id ? 'selected' : '' }}>
                                                    {{ $driver->name }}
                                                @endforeach
                                            </select>
                                        </div><!-- col-4 -->
                                    </div>
                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Race Details: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select class="form-control select2" name="race_details_id"
                                                    data-placeholder="Choose one">
                                                <option value="" selected>Select a Race Details...</option>
                                                @foreach($races as $race)
                                                    <option value="{{ $race->id }}" {{ $race->id == $qualifyingSessions->race_details_id ? 'selected' : '' }}>
                                                    {{ $race->name }}
                                                @endforeach
                                            </select>
                                        </div><!-- col-4 -->
                                    </div>


                                    <div class="row row-xs mg-t-30">
                                        <div class="col-lg-8 mg-l-auto">
                                            <div class="form-layout-footer d-flex justify-content-end">
                                                <button id="edit-qualifying-btn" class="btn btn-info mg-r-5 ml-auto">Submit
                                                    Form
                                                </button>
                                                <button class="btn btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-layout-footer">
                                        <a href="{{ route('qualifying-sessions.index') }}" class="btn btn-primary mr-2">
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

            $('#edit-qualifying-btn').on('click', function () {
                event.preventDefault();
                console.log('clicked')
                const form = $('#edit-qualifying-form');
                let redirectUrl = '{{ route('qualifying-sessions.index') }}';
                let formMethod = 'PUT';
                handleAddEvent(form, redirectUrl, formMethod)
            });

        });

    </script>

@endsection

