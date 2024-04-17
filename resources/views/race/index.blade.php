
@extends('layouts.main')

@section('page_dependencies')
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">

@endsection

<!-- Begin page -->

@section('content')
    <div class="am-mainpanel">
        <div class="am-pagebody">

            <div class="card pd-20 pd-sm-40">
                <a href="{{ route('race.create') }}" class="btn btn-success bd-0 pd-x-20 mg-l-auto">Add new Race Details
                </a>
                <h6 class="card-body-title">Race Details</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Event Name</th>
                            <th class="wd-20p">Circuit Name</th>
                            <th class="wd-15p">Circuit Name</th>
                            <th class="wd-10p">total race time</th>
                            <th class="wd-10p">Weather</th>
                            <th class="wd-10p"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($races as  $race)
                            <tr>
                                <td> {{ $race->event->name ?? ''}}</td>
                                <td> {{ $race->circuit->name ?? ''}}</td>
                                <td> {{ $race->number_of_laps ?? ''}}</td>
                                <td> {{ $race->total_race_time ?? ''}}</td>
                                <td> {{ $race->weather ?? ''}}</td>
                                <td>

                                    <a href="{{ route('race.edit', $race->uuid) }}"
                                       class="btn btn-warning bd-0 pd-x-20 mg-l-auto">Edit
                                    </a>

                                    <a href="#" class="btn btn-danger bd-0 pd-x-20 mg-l-1"
                                       onclick="confirmDelete('{{ $race->id }}')">
                                        <i class="fa fa-trash mg-r-5"></i>Delete
                                    </a>


                                    <form id="delete-event-{{$race->id}}"
                                          action="{{ route('race.destroy', $race->id) }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>


                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div>
    </div>

@stop


@section('page_script')

    <script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/sweatalert.min.js') }}"></script>
    <script src="{{ asset('js/deleteModal.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
