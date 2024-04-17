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
                <a href="{{ route('driver.create') }}" class="btn btn-success bd-0 pd-x-20 mg-l-auto">Add new Driver
                </a>
                <h6 class="card-body-title">Drivers</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th  class="wd-15p">image</th>
                            <th class="wd-15p">Date of Birth</th>
                            <th class="wd-20p">Team</th>
                            <th class="wd-10p">Action</th>
                            {{--                            <th class="wd-25p"></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($drivers as  $driver)
                            <tr>
                                <td> {{ $driver->id ?? ''}}</td>
                                <td class="pd-l-20 ">
                                    <img src="{{ $driver->avatar }}" class="wd-36 rounded-circle" alt="Image">
                                    {{ $driver->name ?? ''}}
                                </td>
                                <td> {{ $driver->date_of_birth ?? ''}}</td>
                                <td> {{ $driver->team->name ?? ''}}</td>
                                <td>

                                    <a href="{{ route('driver.edit', $driver->uuid) }}"
                                       class="btn btn-warning bd-0 pd-x-20 mg-l-auto">Edit
                                    </a>

                                    <a href="#" class="btn btn-danger bd-0 pd-x-20 mg-l-1"
                                       onclick="confirmDelete('{{ $driver->id }}')">
                                        <i class="fa fa-trash mg-r-5"></i>Delete
                                    </a>


                                    <form id="delete-event-{{$driver->id}}"
                                          action="{{ route('driver.destroy', $driver->id) }}" method="POST"
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
