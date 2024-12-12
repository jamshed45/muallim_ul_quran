@extends('layouts.master')
@section('title') Roles @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Edit Role @endslot
    @slot('subtitle') <a href="{{ route('roles.index') }}" >Roles</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Role</h4>
                    <p class="card-title-desc"></p>

                    <form action="{{ route('roles.update', $role) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="Name">Name <span class="text-danger">*</span></label><br>
                            {{ $role->name }}
                        </div>



                        <div class="mb-3" bis_skin_checked="1">

                            <label class="form-label" for="permission">Manage Permissions <span class="text-danger">*</span></label>
                            <hr>
                            <table class="table table-striped table-bordered dt-responsive">
                                <tr>
                                    <th>Module</th>
                                    <th></th>
                                    <th>Merge</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>View</th>
                                </tr>

                                <tr class="bg-dark">
                                    <th class="text-white">Users Management</th>
                                    <th class="text-white"></th>
                                    <th class="text-white">Merge</th>
                                    <th class="text-white">Add</th>
                                    <th class="text-white">Edit</th>
                                    <th class="text-white">Delete</th>
                                    <th class="text-white">View</th>
                                </tr>
                                <tr>
                                    <td>
                                        Users
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled   type="checkbox" name="permissions[]" id="users-management" switch="info" value="Users Management" {{ in_array('Users Management', $rolePermissions) ? 'checked' : '' }}  >
                                        <label class="form-label" for="users-management" data-on-label="Yes"  data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="users-management-add" switch="info" value="Users Management Add" {{ in_array('Users Management Add', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="users-management-add" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="users-management-edit" switch="info" value="Users Management Edit" {{ in_array('Users Management Edit', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="users-management-edit" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="users-management-delete" switch="info" value="Users Management Delete" {{ in_array('Users Management Delete', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="users-management-delete" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="users-management-view" switch="info" value="Users Management View" {{ in_array('Users Management View', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="users-management-view" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                </tr>
                                <tr class="bg-dark">
                                    <th class="text-white">Roles Management</th>
                                    <th class="text-white"></th>
                                    <th class="text-white">Merge</th>
                                    <th class="text-white">Add</th>
                                    <th class="text-white">Edit</th>
                                    <th class="text-white">Delete</th>
                                    <th class="text-white">View</th>
                                </tr>
                                <tr>
                                    <td>
                                        Roles
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="roles-management" switch="info" value="Roles Management" {{ in_array('Roles Management', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="roles-management" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="roles-management-add" switch="info" value="Roles Management Add" {{ in_array('Roles Management Add', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="roles-management-add" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="roles-management-edit" switch="info" value="Roles Management Edit" {{ in_array('Roles Management Edit', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="roles-management-edit" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="roles-management-delete" switch="info" value="Roles Management Delete" {{ in_array('Roles Management Delete', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="roles-management-delete" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled type="checkbox" name="permissions[]" id="roles-management-view" switch="info" value="Roles Management View" {{ in_array('Roles Management View', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="roles-management-view" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                </tr>

                                <tr class="bg-dark">
                                    <th class="text-white">Clients Management</th>
                                    <th class="text-white"></th>
                                    <th class="text-white">Merge</th>
                                    <th class="text-white">Add</th>
                                    <th class="text-white">Edit</th>
                                    <th class="text-white">Delete</th>
                                    <th class="text-white">View</th>
                                </tr>
                                <tr>
                                    <td>
                                        Clients
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="clients-management" switch="info" value="Clients Management" {{ in_array('Clients Management', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="clients-management" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="clients-management-add" switch="info" value="Clients Management Add" {{ in_array('Clients Management Add', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="clients-management-add" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="clients-management-edit" switch="info" value="Clients Management Edit" {{ in_array('Clients Management Edit', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="clients-management-edit" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="clients-management-delete" switch="info" value="Clients Management Delete" {{ in_array('Clients Management Delete', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="clients-management-delete" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled type="checkbox" name="permissions[]" id="clients-management-view" switch="info" value="Clients Management View" {{ in_array('Clients Management View', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="clients-management-view" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Locations
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="locations-management" switch="info" value="Locations Management" {{ in_array('Locations Management', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="locations-management" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="locations-management-add" switch="info" value="Locations Management Add" {{ in_array('Locations Management Add', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="locations-management-add" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="locations-management-edit" switch="info" value="Locations Management Edit" {{ in_array('Locations Management Edit', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="locations-management-edit" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="locations-management-delete" switch="info" value="Locations Management Delete" {{ in_array('Locations Management Delete', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="locations-management-delete" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled type="checkbox" name="permissions[]" id="locations-management-view" switch="info" value="Locations Management View" {{ in_array('Locations Management View', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="locations-management-view" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                </tr>
                                <tr class="bg-dark">
                                    <th class="text-white">Data Management</th>
                                    <th class="text-white"></th>
                                    <th class="text-white">Merge</th>
                                    <th class="text-white">Add</th>
                                    <th class="text-white">Edit</th>
                                    <th class="text-white">Delete</th>
                                    <th class="text-white">View</th>
                                </tr>
                                <tr>
                                    <td>
                                        Core Patient
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="core-patient" switch="info" value="Core Patient" {{ in_array('Core Patient', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="core-patient" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Core Appt.
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="core-appt" switch="info" value="Core Appt" {{ in_array('Core Appt', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="core-appt" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        D.Flo Patient
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="d-flo-patient" switch="info" value="D-Flo Patient" {{ in_array('D-Flo Patient', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="d-flo-patient" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        D.Flo Appt.
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="d-flo-appt" switch="info" value="D-Flo Appt" {{ in_array('D-Flo Appt', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="d-flo-appt" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Skip Appointments D-Flo
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="skip-appointment-d-flo" switch="info" value="Skip Appointments D-Flo" {{ in_array('Skip Appointments D-Flo', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="skip-appointment-d-flo" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="skip-appointment-d-flo-merge-data" switch="info" value="Skip Appointments D-Flo Merge Data" {{ in_array('Skip Appointments D-Flo Merge Data', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="skip-appointment-d-flo-merge-data" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Skip Appointments Core
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="skip-appointments-core" switch="info" value="Skip Appointments Core" {{ in_array('Skip Appointments Core', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="skip-appointments-core" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="skip-appointments-core-merge-data" switch="info" value="Skip Appointments Core Merge Data"  {{ in_array('Skip Appointments Core Merge Data', $rolePermissions) ? 'checked' : '' }} >
                                        <label class="form-label" for="skip-appointments-core-merge-data" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>

                                <tr class="bg-dark">
                                    <th class="text-white">Settings</th>
                                    <th class="text-white"></th>
                                    <th class="text-white">Merge</th>
                                    <th class="text-white">Add</th>
                                    <th class="text-white">Edit</th>
                                    <th class="text-white">Delete</th>
                                    <th class="text-white">View</th>
                                </tr>

                                <tr>
                                    <td>
                                        Site Setting
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="admin-site-setting-edit" switch="info" value="Admin Site Setting Edit" {{ in_array('Admin Site Setting Edit', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="admin-site-setting-edit" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="admin-site-setting-view" switch="info" value="Admin Site Setting View" {{ in_array('Admin Site Setting View', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="admin-site-setting-view" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Core Practice Setting
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="admin-core-practice-setting-edit" switch="info" value="Admin Core Practice Setting Edit" {{ in_array('Admin Core Practice Setting Edit', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="admin-core-practice-setting-edit" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="admin-core-practice-setting-view" switch="info" value="Admin Core Practice Setting View" {{ in_array('Admin Core Practice Setting View', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="admin-core-practice-setting-view" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        D Flo Setting
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="admin-d-flo-setting-edit" switch="info" value="Admin D Flo Setting Edit" {{ in_array('Admin D Flo Setting Edit', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="admin-d-flo-setting-edit" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <input class="form-check form-switch" disabled  type="checkbox" name="permissions[]" id="admin-d-flo-setting-view" switch="info" value="Admin D Flo Setting View" {{ in_array('Admin D Flo Setting View', $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-label" for="admin-d-flo-setting-view" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                </tr>



                            </table>



                        </div>




                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')



    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
