@extends('layouts.master')
@section('title') Clients @endsection
@section('css')
<!-- DataTables -->
<link href="{{URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') All Books Orders @endslot
    @slot('subtitle') Books Orders @endslot
    @endcomponent



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-6"><h4 class="card-title">Books Orders</h4></div>
                        <div class="col-md-6 text-end">
                            @if(auth()->check() && (auth()->user()->hasRole('Super Admin')))
                                <div class="form-group" id="rolesContainer">
                                    <label class="form-label">Select role to see user in list</label><br>
                                    @foreach($roles as $role)
                                        <div class="form-check form-check-inline" style="display:{{ ($role->name == 'Client') ? 'none':'' }}">
                                            <input class="form-check-input" type="checkbox" name="get_role_list[]" id="get_role_list"  value="{{ $role->name }}" id="role_{{ $role->id }}" {{ in_array($role->name, $roleNames) ? 'checked' : '' }} >
                                            <label class="form-check-label" for="role_{{ $role->id }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12">

    {{-- <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="dropdown-text"> Select Options</span>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#"><label><input type="checkbox" class="selectall" /><span class="select-text"> Select</span> All</label></a></li>
    <li class="divider"></li>
    <li><a class="option-link" href="#"><label><input name='options[]' type="checkbox" class="option justone" value='Option 1 '/> Option 1</label></a></li>
    <li><a href="#"><label><input name='options[]' type="checkbox" class="option justone" value='Option 2 '/> Option 2</label></a></li>
    <li><a href="#"><label><input name='options[]' type="checkbox" class="option justone" value='Option 3 '/> Option 3</label></a></li>
  </ul>
</div>

<br><br><br><br><br> --}}

                        </div>
                    </div>

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
                                <th>ID</th>
                                <th>Customer Info</th>
                                <th>Address</th>
                                <th>Books Information</th>
                                <th>Booking Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($records as $record)

                            <tr>
                                <td>{{ $record->id }}</td>
                                <td><b>Name :</b> {{ $record->first_name }} {{ $record->last_name }}<br>
                                    <b>Email :</b> {{ $record->email }}<br>
                                    <b>Moile :</b> {{ $record->mobile }}<br>
                                </td>
                                <td>{{ $record->address }}</td>
                                <td>
                                    <b>Book Vol 1 :</b> {{ $record->vol1 }}<br>
                                    <b>Book Vol 2 :</b> {{ $record->vol2 }}<br>
                                    <b>Book Vol 3 :</b> {{ $record->vol3 }}<br>
                                </td>
                                <td>
                                    {{ $record->posted_date }}
                                </td>
                                <td>

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
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Client
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this client?
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


            $('body').on("click", ".dropdown-menu", function (e) {

                $(this).parent().is(".open") && e.stopPropagation();
            });

        });



        document.addEventListener('DOMContentLoaded', function() {
            const rolesContainer = document.getElementById('rolesContainer');

            rolesContainer.addEventListener('change', function() {
                // Get all checked checkboxes
                const checkedRoles = Array.from(document.querySelectorAll('input[name="get_role_list[]"]:checked'))
                    .map(checkbox => checkbox.value);

                // Create a query string with checked roles
                const queryString = new URLSearchParams({ 'get_role_list[]': checkedRoles }).toString();

                // Update the URL with the new query string
                const newUrl = `${window.location.pathname}?${queryString}`;

                // Reload the page with the new URL
                window.location.href = newUrl;
            });
        });



    </script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
