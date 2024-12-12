@extends('layouts.master')
@section('title') Roles @endsection
@section('css')
<!-- DataTables -->
<link href="{{URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') All Roles @endslot
    @slot('subtitle') Roles @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Roles</h4>

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Roles Management Edit')))
                                        @if($role->name != 'Super Admin' && !auth()->user()->hasRole($role->name))
                                            <a href="{{ route('roles.edit', $role) }}" class="text-success mx-2">
                                                <i class="fas fa-marker" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                    @endif
                                    @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Roles Management Delete')) && $role->name != 'Client')
                                        @if($role->name != 'Super Admin' && !auth()->user()->hasRole($role->name))
                                            <a href="#" onclick="confirmDelete('{{ route('roles.destroy', $role) }}')" class="text-danger mx-2">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                    @endif

                                    @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Roles Management View')) && $role->name != 'Client')
                                        @if($role->name != 'Super Admin' && !auth()->user()->hasRole($role->name))
                                        <a href="{{ route('roles.show', $role) }}" class="text-success mx-2">
                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    @endif


                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <script>
                        function confirmDelete(action) {
                            $('#deleteForm').attr('action', action);
                            $('#deleteConfirmationModal').modal('show');
                        }
                    </script>


                    <div class="modal fade" id="deleteConfirmationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Role
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this role?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="deleteForm" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->



                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')

    <!-- Required datatable js -->
    <script src="{{URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    {{-- <script src="{{URL::asset('assets/js/pages/datatables.init.js')}}"></script> --}}

    <script>

        $(document).ready(function() {

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                "pageLength": {{ get_records_per_page() }} ,
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

                $(".dataTables_length select").addClass('form-select form-select-sm');
        } );

    </script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
