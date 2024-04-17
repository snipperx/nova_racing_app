@extends('layouts.main')

@section('page_dependencies')
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

<!-- Begin page -->

@section('content')
    <div class="am-mainpanel row justify-content-center">
        <div class="am-pagebody col-md-10">

            <div class="card pd-20 pd-md-40 mg-t-50">
                <h6 class="card-body-title">Create a new Race Results</h6>
                <form id="add-results-form" class="form-horizontal" action="{{ route('race-results.store') }}">
                    @csrf
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
                                        <label class="col-sm-4 form-control-label">Podium Position: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="number" class="form-control" name="podium_position"
                                                   placeholder="Enter Team podium position">
                                        </div>
                                    </div>
                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Race time : <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="race_time"
                                                   placeholder="Enter race time">
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Teams: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select class="form-control select2" name="team_id" data-placeholder="Choose one">
                                                <option value="" selected>Select a Team...</option>
                                                @foreach($teams as $team)
                                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- col-4 -->
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Driver: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select class="form-control select2" name="driver_id" data-placeholder="Choose one">
                                                <option value="" selected>Select a driver...</option>
                                                @foreach($drivers as $driver)
                                                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- col-4 -->
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Race details: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select class="form-control select2" name="race_details_id" data-placeholder="Choose one">
                                                <option value="" selected>Select a race...</option>
                                                @foreach($race_details as $race_detail)
                                                    <option value="{{ $race_detail->id }}">{{ $race_detail->name }}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- col-4 -->
                                    </div>


                                    <div class="row row-xs mg-t-30">
                                        <div class="col-lg-8 mg-l-auto">
                                            <div class="form-layout-footer d-flex justify-content-end">
                                                <button id="add-results-btn" class="btn btn-info mg-r-5 ml-auto">Submit Form</button>
                                                <button class="btn btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-layout-footer">
                                        <a href="{{ route('race-results.index') }}" class="btn btn-primary mr-2">
                                            <i class="fa fa-arrow-left mg-r-10"></i>Back</a>
                                    </div>

                                </div><!-- card -->
                            </div><!-- col-6 -->
                        </div><!-- row -->
                    </div><!-- col-6 -->
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

            $('#add-results-btn').on('click', function () {
                event.preventDefault();
                const form = $('#add-results-form');
                let redirectUrl = '{{ route('race-results.index') }}';
                let formMethod = 'POST';
                handleAddEvent(form, redirectUrl, formMethod)
            });
        });
    </script>

@endsection

