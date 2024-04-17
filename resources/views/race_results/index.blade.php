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
                <a href="{{ route('race-results.create') }}" class="btn btn-success bd-0 pd-x-20 mg-l-auto">Add Race Results
                </a>
                <h6 class="card-body-title">Race Results</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Name of Team</th>
                            <th class="wd-15p">Driver</th>
                            <th class="wd-20p">Podium</th>
                            <th class="wd-15p">Race Time</th>
{{--                            <th class="wd-15p">Race Details</th>--}}
                            <th class="wd-10p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($results as  $result)
                            <tr>
                                <td> {{ $result->id ?? ''}}</td>
                                <td>
                                    <img src="{{ $result->driver->avatar }}" class="wd-36 rounded-circle" alt="Image">
                                    {{ $result->team->name ?? ''}}
                                </td>
                                <td> {{ $result->driver->name ?? ''}}</td>
                                <td> {{ $result->podium_position ?? ''}}</td>
                                <td> {{ $result->race_time ?? ''}}</td>

                                <td>

                                    <a href="{{ route('race-results.edit', $result->uuid) }}"
                                       class="btn btn-warning bd-0 pd-x-20 mg-l-auto">Edit
                                    </a>

                                    <a href="#" class="btn btn-danger bd-0 pd-x-20 mg-l-1"
                                       onclick="confirmDelete('{{ $result->id }}')">
                                        <i class="fa fa-trash mg-r-5"></i>Delete
                                    </a>


                                    <form id="delete-event-{{$result->id}}"
                                          action="{{ route('race-results.destroy', $result->id) }}" method="POST"
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
