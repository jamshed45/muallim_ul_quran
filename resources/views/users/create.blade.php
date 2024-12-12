@extends('layouts.master')
@section('title') Users @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Create User @endslot
    @slot('subtitle') <a href="{{ route('users.index') }}">Users</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Users</h4>
                    <p class="card-title-desc"></p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="row g-3"  action="{{ route('users.store') }}" autocomplete="off" method="POST">
                        @csrf

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="Name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" autocomplete="off webauthn" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="password">Password  <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="roles">Select Default <span class="text-danger">*</span></label>
                            <select class="form-control" name="roles[]" id="roles" required>
                                <option value="" disabled selected>Select a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" data-role-id="{{ $role->id }}" {{ in_array($role->name, old('roles', [])) ? 'selected' : '' }}>
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
                                        {{ in_array($role->name, old('roles', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role-{{ $role->id }}">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" id="default_role_id" name="default_role_id" value="">


                        <div class="col-12" bis_skin_checked="1">
                            <button class="btn btn-primary" type="submit">Add User</button>
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

            function updateCheckboxesAndDefaultRole() {
                const selectedOption = dropdown.options[dropdown.selectedIndex];
                const selectedRole = selectedOption.value;
                const selectedRoleId = selectedOption.getAttribute('data-role-id');

                defaultRoleIdInput.value = selectedRoleId;

                checkboxes.forEach(function(checkbox) {
                    checkbox.disabled = (checkbox.value === selectedRole);
                });
            }

            dropdown.addEventListener('change', updateCheckboxesAndDefaultRole);

            updateCheckboxesAndDefaultRole();
        });
    </script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
