@extends('layouts.master')
@section('title') Users @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Edit User @endslot
    @slot('subtitle') <a href="{{ route('users.index') }}">Users</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit User</h4>
                    <p class="card-title-desc"></p>

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="Name">Name <span class="text-danger">*</span></label>
                            <div bis_skin_checked="1">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                            </div>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="roles">Select Default <span class="text-danger">*</span></label>
                            <select class="form-control" name="roles[]" id="roles" required>
                                <option value="" disabled>Select a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" data-role-id="{{ $role->id }}"
                                        {{ ($role->id == $user->default_role_id) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="roles">Roles <span class="text-danger">*</span></label>
                            @foreach ($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->name }}"
                                        id="role-{{ $role->id }}"
                                        {{ in_array($role->name, old('roles', $userRoles)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role-{{ $role->id }}">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Hidden input to store the selected default role ID -->
                        <input type="hidden" id="default_role_id" name="default_role_id" value="{{ $user->default_role_id }}">


                        <div class="col-12" bis_skin_checked="1">
                            <button class="btn btn-primary" type="submit">Update User</button>
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.getElementById('roles');
            const checkboxes = document.querySelectorAll('.form-check-input');
            const defaultRoleIdInput = document.getElementById('default_role_id');

            // Disable the checkbox if the role is selected in the dropdown and update the hidden input
            function updateCheckboxesAndDefaultRole() {
                const selectedOption = dropdown.options[dropdown.selectedIndex];
                const selectedRole = selectedOption.value;
                const selectedRoleId = selectedOption.getAttribute('data-role-id');

                // Update the hidden default_role_id input field
                defaultRoleIdInput.value = selectedRoleId;

                // Disable corresponding checkbox
                checkboxes.forEach(function(checkbox) {
                    checkbox.disabled = (checkbox.value === selectedRole);
                });
            }

            // Event listener when a role is selected from the dropdown
            dropdown.addEventListener('change', updateCheckboxesAndDefaultRole);

            // Initialize checkboxes and default role input based on initial selected value
            updateCheckboxesAndDefaultRole();
        });
    </script>


    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection





