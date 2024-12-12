@extends('layouts.master')
@section('title') Clients @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Edit Client @endslot
    @slot('subtitle') <a href="{{ route('clients.index') }}">Clients</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


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



                    <h4 class="card-title">Clients</h4>
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



                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if(!session('api_tab')) active show @else @endif" data-bs-toggle="tab" href="#tab1" role="tab1" aria-selected="true">
                                    <span class="d-none d-md-block">General Settings</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if(session('api_tab')) active show @else @endif" data-bs-toggle="tab" href="#tab2" role="tab2" aria-selected="false" tabindex="-1">
                                    <span class="d-none d-md-block">API Settings</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                </a>
                            </li>
                        </ul>


                                            <!-- Tab panes -->
                    <div class="tab-content">


                        <div class="tab-pane pt-3 pb-3 @if(!session('api_tab')) active show @else @endif" id="tab1" role="tabpanel">

                            <form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="client_setting" value="1" />
                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="Name">Name <span class="text-danger">*</span></label>
                                    <div bis_skin_checked="1">
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $client->name }}" required>
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="Name">Unique Login URL <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="unique_login_url_name" id="unique_login_url_name" value="{{ $client->unique_login_url_name }}" required>
                                        <small>{{ url('/') }}/login/<span id="unique_login_url_name_text">{{ $client->unique_login_url_name }}</span></small>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label  class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $client->email }}" required>
                                </div>

                                {{-- <div class="mb-3" bis_skin_checked="1">
                                    <label  class="form-label" for="description">Description <span class="text-danger">*</span></label>
                                    <textarea type="text" name="description" id="description" class="form-control" value="{{ $client->description }}" required>{{ $client->description }}</textarea>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="company_name">Company Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $client->company_name }}" required>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="abn">ABN <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="abn" id="abn" value="{{ $client->abn }}" required>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="map_url">Map URL <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="map_url" id="map_url" value="{{ $client->map_url }}" required>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $client->phone }}" required>
                                </div> --}}

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="mobile">Mobile <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $client->mobile }}" required>
                                </div>

                                {{-- <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="fax">Fax <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="fax" id="fax" value="{{ $client->fax }}" required>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="state">State <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="state" id="state" value="{{ $client->state }}" required>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="country">Country <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="country" id="country" value="{{ $client->country }}" required>
                                </div> --}}

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label  class="form-label" for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="profile_image">Profile Image</label>
                                    @if(isset($client->profile_image) && $client->profile_image !='')
                                    <br>
                                    <img src="{{ asset('public/storage/' . $client->profile_image) }}" width="150" alt="Site Desktop Logo" class="img-thumbnail mt-2" style="max-width: 150px;">
                                    <br><br>
                                @endif

                                    <input type="file" class="form-control" name="profile_image" id="profile_image" value="" >
                                    {{-- {{ old('profile_image', $settings['profile_image'] ?? '') }} --}}
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label  class="form-label" for="client_status">Status</label>

                                    <select class="form-control" name="status" id="client_status" required>
                                        <option value="">Select Status</option>
                                        <option value="1" {{ $client->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $client->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <button class="btn btn-primary" type="submit">Update Client</button>
                                </div>

                            </form>

                        </div>

                        <div class="tab-pane pt-3 pb-3 @if(session('api_tab')) active show @else @endif" id="tab2" role="tabpanel">
                            <form  action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                            <div class="row">

                                <h4>CorePractice Settings</h4>
                                <div class="col-md-6">

                                    <input type="hidden" name="client_api_live_settings" value="1" />
                                    <h5>Live</h5><hr>
                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="live_client_id">Client ID</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="core_practice_live_client_id" id="core_practice_live_client_id" value="{{ old('core_practice_live_client_id', $client_api_setting['core_practice_live_client_id'] ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="live_api_key">API Key</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="core_practice_live_api_key" id="core_practice_live_api_key" value="{{ old('core_practice_live_api_key', $client_api_setting['core_practice_live_api_key'] ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="live_secret_key">Secret Key</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="core_practice_live_secret_key" id="core_practice_live_secret_key" value="{{ old('core_practice_live_secret_key', $client_api_setting['core_practice_live_secret_key'] ?? '') }}" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <h5>Sandbox</h5><hr>
                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="sandbox_client_id">Client ID</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="core_practice_sandbox_client_id" id="core_practice_sandbox_client_id" value="{{ old('core_practice_sandbox_client_id', $client_api_setting['core_practice_sandbox_client_id'] ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="sandbox_api_key">API Key</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="core_practice_sandbox_api_key" id="core_practice_sandbox_api_key" value="{{ old('core_practice_sandbox_api_key', $client_api_setting['core_practice_sandbox_api_key'] ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="sandbox_secret_key">Secret Key</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="core_practice_sandbox_secret_key" id="core_practice_sandbox_secret_key" value="{{ old('core_practice_sandbox_secret_key', $client_api_setting['core_practice_sandbox_secret_key'] ?? '') }}" required>
                                        </div>
                                    </div>

                                </div>

                            </div>




                            <div class="row">
                                <hr>

                                <h4>D.Flo Settings</h4>
                                <div class="col-md-6">

                                    <h5>Live</h5><hr>
                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="ghl_settings_live_client_id">Client ID</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="ghl_settings_live_client_id" id="ghl_settings_live_client_id" value="{{ old('ghl_settings_live_client_id', $client_api_setting['ghl_settings_live_client_id'] ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="ghl_settings_live_api_key">API Key</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="ghl_settings_live_api_key" id="ghl_settings_live_api_key" value="{{ old('ghl_settings_live_api_key', $client_api_setting['ghl_settings_live_api_key'] ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="live_secret_key">Secret Key</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="ghl_settings_live_secret_key" id="ghl_settings_live_secret_key" value="{{ old('ghl_settings_live_secret_key', $client_api_setting['ghl_settings_live_secret_key'] ?? '') }}" required>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <h5>Sandbox</h5><hr>
                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="ghl_settings_sandbox_client_id">Client ID</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="ghl_settings_sandbox_client_id" id="ghl_settings_sandbox_client_id" value="{{ old('ghl_settings_sandbox_client_id', $client_api_setting['ghl_settings_sandbox_client_id'] ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="sandbox_api_key">API Key</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="ghl_settings_sandbox_api_key" id="ghl_settings_sandbox_api_key" value="{{ old('ghl_settings_sandbox_api_key', $client_api_setting['ghl_settings_sandbox_api_key'] ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="sandbox_secret_key">Secret Key</label>
                                        <div bis_skin_checked="1">
                                        <input type="text" class="form-control" name="ghl_settings_sandbox_secret_key" id="ghl_settings_sandbox_secret_key" value="{{ old('ghl_settings_sandbox_secret_key', $client_api_setting['ghl_settings_sandbox_secret_key'] ?? '') }}" required>
                                        </div>
                                    </div>


                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <button class="btn btn-primary" type="submit">Update Settings</button>
                                </div>

                            </div>

                        </div>



                    </div>









                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')

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
