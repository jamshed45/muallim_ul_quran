@extends('layouts.master')
@section('title') Clients @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Create Client @endslot
    @slot('subtitle') <a href="{{ route('clients.index') }}">Clients</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Clients</h4>
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

                    <form class="row g-3"  action="{{ route('clients.store') }}" autocomplete="off" method="POST">
                        @csrf

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="Name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="Name">Unique Login URL <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="unique_login_url_name" id="unique_login_url_name" value="{{ old('unique_login_url_name') }}" required>
                                <small>{{ url('/') }}/login/<span id="unique_login_url_name_text"></span></small>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" autocomplete="off webauthn" required>
                        </div>

                        {{-- <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="description">Description <span class="text-danger">*</span></label>
                            <textarea type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required></textarea>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="company_name">Company Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="company_name" id="company_name" value="{{ old('company_name') }}" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="abn">ABN <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="abn" id="abn" value="{{ old('abn') }}" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="map_url">Map URL <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="map_url" id="map_url" value="{{ old('map_url') }}" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('map_url') }}" required>
                        </div> --}}

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="mobile">Mobile <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="mobile" id="mobile" value="{{ old('map_url') }}" required>
                        </div>
{{--
                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="fax">Fax <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="fax" id="fax" value="{{ old('map_url') }}" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="state">State <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="state" id="state" value="{{ old('map_url') }}" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="country">Country <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="country" id="country" value="{{ old('map_url') }}" required>
                        </div> --}}

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="password">Password  <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="client_status">Status</label>

                            <select class="form-control" name="status" id="client_status" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                        </div>


                        <div class="col-12" bis_skin_checked="1">
                            <button class="btn btn-primary" type="submit">Add Client</button>
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')

    {{-- <script src="{{URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/pages/form-validation.init.js')}}"></script> --}}

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uniqueUrlInput = document.getElementById('unique_login_url_name');
            const uniqueUrlText = document.getElementById('unique_login_url_name_text');

            const regex = /^[a-z0-9]+$/;  // Allow lowercase letters and numbers

            uniqueUrlInput.addEventListener('input', function() {
                // Convert input to lowercase and remove invalid characters
                let inputValue = uniqueUrlInput.value.toLowerCase();
                inputValue = inputValue.replace(/[^a-z0-9]/g, '');

                // Update the input field and text content
                uniqueUrlInput.value = inputValue;
                uniqueUrlText.textContent = inputValue;
            });
        });
    </script>

    @endsection
