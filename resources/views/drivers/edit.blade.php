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
                <h6 class="card-body-title">Edit Driver -- {{ $driver->name ?? '' }}</h6>

                <form id="edit-driver-form" class="form-horizontal" method="post" action="{{ route('driver.update', $driver->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('Put')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div id="invalid-input-alert"></div>
                    <div id="success-alert"></div>

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <div class="col-xl-10">
                        <div class="row row-sm mg-t-20">
                            <div class="col-xl-12">
                                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

                                    <div class="row">
                                        <label class="col-sm-4 form-control-label">First Name: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ $driver->name ?? '' }}"
                                                   placeholder="Enter event name">
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Date of birth: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control fc-datepicker"
                                                   value="{{ $driver->date_of_birth ?? '' }}"
                                                   name="date_of_birth"
                                                   placeholder="MM/DD/YYYY">
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Team: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select class="form-control select2" name="team_id"
                                                    data-placeholder="Choose one">
                                                <option value="" selected>Select a Team...</option>
                                                @foreach($teams as $team)
                                                    <option
                                                        value="{{ $team->id }}" {{ $team->id == $driver->team_id ? 'selected' : '' }}>
                                                        {{ $team->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div><!-- col-4 -->
                                    </div>


                                    <div class="row mg-t-20">
                                        <label class="custom-file col-sm-4 form-control-label"><span
                                                class="tx-danger"></span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            @if ($driver->avatar)
                                                <img src="{{ $driver->avatar }}" class="wd-36 rounded-circle ml-2"
                                                     alt="Image">
                                            @endif
                                        </div>

                                    </div>
                                    <div class="row mg-t-20">
                                        <label class="custom-file col-sm-4 form-control-label">Driver Image: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="file" name="image" id="image"/>
                                            <span class="custom-file-control custom-file-control-primary"></span>
                                        </div>
                                    </div>


                                    <div class="row row-xs mg-t-30">
                                        <div class="col-lg-8 mg-l-auto">
                                            <div class="form-layout-footer d-flex justify-content-end">
                                                <button type="submit" id="edit-driver-btn" class="btn btn-info mg-r-5 ml-auto">Submit
                                                    Form
                                                </button>
                                                <button class="btn btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-layout-footer">
                                        <a href="{{ route('driver.index') }}" class="btn btn-primary mr-2">
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

        });

    </script>

@endsection

