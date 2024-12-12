@extends('layouts.master')
@section('title') Users @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') View User @endslot
    @slot('subtitle') <a href="{{ route('users.index') }}">Users</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">View User</h4>
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


                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="Name">Name </label><br>
                                {{ $user->name }}
                        </div>
                        <hr>
                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="email">Email</label><br>
                            {{ $user->email }}
                        </div>
                        <hr>


                        <div class="mb-3">
                            <label class="form-label" for="roles">Defualt Role</label><br>
                                @foreach ($roles as $role)
                                    {{ ($role->id == $user->default_role_id) ? $role->name  : '' }}
                                @endforeach
                            </select>
                        </div>
                        <hr>

                        <div class="mb-3">
                            <label class="form-label" for="roles">Roles </label><br>
                            @foreach ($roles as $role)
                            @if(in_array($role->name, old('roles', $userRoles)))
                                {{ $role->name }}
                                <br>
                            @endif
                            @endforeach
                        </div>
                        <hr>




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





