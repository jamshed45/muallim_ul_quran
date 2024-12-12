@extends('layouts.master')
@section('title') Clients @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Create Client @endslot
    @slot('subtitle') <a href="{{ route('users.index') }}">Clients</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Clients</h4>

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
                                <th>Email</th>
                                <th>Staging / Live</th>
                                <th>API Triggers</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tbody>

                <tr class="odd">
                    <td class="sorting_1 dtr-control">
                    Aadam Shah
                    </td>
                    <td>
                    sharumshah@hotmail.com
                    </td>
                    <td>
                        <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
                        <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
                    </td>
                    <td>
                        <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
                        <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
                    </td>
                    <td>
                        <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </a>
                        <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </a>


                        <a href="#" onclick="confirmDelete('http://localhost/leadflo-rebuilt/roles/15')" class="text-danger mx-2">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>


</tr>
<tr class="even">

<td class="sorting_1 dtr-control">
Aadam Shah
</td>
<td>
sharumshuh@hotmail.com
</td>
<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>

<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>
<td>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-cog" aria-hidden="true"></i>
    </a>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
    </a>


    <a href="#" onclick="confirmDelete('http://localhost/leadflo-rebuilt/roles/15')" class="text-danger mx-2">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
</td>


</tr><tr class="odd">

<td class="sorting_1 dtr-control">
Aalliyah Hardy
</td>
<td>
natasha_1313@hotmail.com
</td>
<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>

<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>
<td>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-cog" aria-hidden="true"></i>
    </a>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
    </a>


    <a href="#" onclick="confirmDelete('http://localhost/leadflo-rebuilt/roles/15')" class="text-danger mx-2">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
</td>


</tr><tr class="even">

<td class="sorting_1 dtr-control">
Aalliyah Hardy
</td>
<td>
natasha_1313@hotmail.com
</td>
<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>

<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>
<td>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-cog" aria-hidden="true"></i>
    </a>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
    </a>


    <a href="#" onclick="confirmDelete('http://localhost/leadflo-rebuilt/roles/15')" class="text-danger mx-2">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
</td>


</tr><tr class="odd">

<td class="sorting_1 dtr-control">
Aayden Stoddart
</td>
<td>
aayden2002@outlook.com
</td>
<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>

<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>
<td>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-cog" aria-hidden="true"></i>
    </a>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
    </a>


    <a href="#" onclick="confirmDelete('http://localhost/leadflo-rebuilt/roles/15')" class="text-danger mx-2">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
</td>


</tr><tr class="even">

<td class="sorting_1 dtr-control">
Abbey Agostinelli
</td>
<td>
abbey.agostinelli@hotmail.com
</td>
<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>

<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>
<td>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-cog" aria-hidden="true"></i>
    </a>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
    </a>


    <a href="#" onclick="confirmDelete('http://localhost/leadflo-rebuilt/roles/15')" class="text-danger mx-2">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
</td>


</tr><tr class="odd">

<td class="sorting_1 dtr-control">
Abby Foster
</td>
<td>
afoster.talented@gmail.com
</td>
<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>

<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>
<td>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-cog" aria-hidden="true"></i>
    </a>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
    </a>


    <a href="#" onclick="confirmDelete('http://localhost/leadflo-rebuilt/roles/15')" class="text-danger mx-2">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
</td>


</tr><tr class="even">

<td class="sorting_1 dtr-control">
Abdul Alkhatib
</td>
<td>
rimdaghmash@gmail.com
</td>
<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>

<td>
    <input class="form-check form-switch" type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" checked="">
    <label class="form-label" for="users-management" data-on-label="Yes" data-off-label="No"></label>
</td>
<td>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-cog" aria-hidden="true"></i>
    </a>
    <a href="http://localhost/leadflo-rebuilt/roles/15/edit" class="text-success mx-2">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
    </a>


    <a href="#" onclick="confirmDelete('http://localhost/leadflo-rebuilt/roles/15')" class="text-danger mx-2">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
</td>


</tr></tbody>

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
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">User
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this user?
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
    </div>  <!-- end row -->

    @endsection
    @section('scripts')

    {{-- <script src="{{URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/pages/form-validation.init.js')}}"></script> --}}

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
