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



                    <h4 class="card-title">Clients</h4>
                    <p class="card-title-desc"></p>




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



                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="Name">Name <span class="text-danger">*</span></label><br>
                                    {{ $client->name }}
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="Name">Unique Login URL <span class="text-danger">*</span></label><br>

                                        {{ url('/') }}/login/<span id="unique_login_url_name_text">{{ $client->unique_login_url_name }}</span>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label  class="form-label" for="email">Email <span class="text-danger">*</span></label><br>
                                    {{ $client->email }}
                                </div>



                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="mobile">Mobile <span class="text-danger">*</span></label><br>
                                    {{ $client->mobile }}
                                </div>



                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="profile_image">Profile Image</label>
                                    @if(isset($client->profile_image) && $client->profile_image !='')
                                    <br>
                                    <img src="{{ asset('public/storage/' . $client->profile_image) }}" width="150" alt="Site Desktop Logo" class="img-thumbnail mt-2" style="max-width: 150px;">
                                    <br><br>
                                @endif

                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label  class="form-label" for="client_status">Status</label><br>
                                    {{ $client->status == 1 ? 'Active' : 'Inactive' }}

                                </div>


                            </form>

                        </div>

                        <div class="tab-pane pt-3 pb-3 @if(session('api_tab')) active show @else @endif" id="tab2" role="tabpanel">

                            <div class="row">
                                <h4>CorePractice Settings</h4>

                                <div class="col-md-6">
                                <h5>Live</h5><hr>
                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="live_client_id">Client ID</label>
                                    <div bis_skin_checked="1">
                                    {{ isset($client_api_setting['core_practice_live_client_id'])?$client_api_setting['core_practice_live_client_id']:''; }}
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="live_api_key">API Key</label>
                                    <div bis_skin_checked="1">
                                        {{ isset($client_api_setting['core_practice_live_api_key'])?$client_api_setting['core_practice_live_api_key']:''; }}
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="live_secret_key">Secret Key</label>
                                    <div bis_skin_checked="1">
                                        {{ isset($client_api_setting['core_practice_live_api_key'])?$client_api_setting['core_practice_live_api_key']:'' }}
                                    </div>
                                </div>

                                </div>
                                <div class="col-md-6">

                                <h5>Sandbox</h5><hr>
                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="sandbox_client_id">Client ID</label>
                                    <div bis_skin_checked="1">
                                        {{ isset($client_api_setting['core_practice_sandbox_client_id'])?$client_api_setting['core_practice_sandbox_client_id']:'' }}
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="sandbox_api_key">API Key</label>
                                    <div bis_skin_checked="1">
                                        {{ isset($client_api_setting['core_practice_sandbox_api_key'])?$client_api_setting['core_practice_sandbox_api_key']:'' }}
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="sandbox_secret_key">Secret Key</label>
                                    <div bis_skin_checked="1">

                                        {{ isset($client_api_setting['core_practice_sandbox_secret_key'])?$client_api_setting['core_practice_sandbox_secret_key']:'' }}
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
                                        {{ isset($client_api_setting['ghl_settings_live_client_id'])?$client_api_setting['ghl_settings_live_client_id']:'' }}
                                        </div>
                                    </div>

                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="ghl_settings_live_api_key">API Key</label>
                                        <div bis_skin_checked="1">
                                        {{ isset($client_api_setting['ghl_settings_live_api_key'])?$client_api_setting['ghl_settings_live_api_key']:'' }}
                                        </div>
                                    </div>

                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label" for="live_secret_key">Secret Key</label>
                                        <div bis_skin_checked="1">
                                            {{ isset($client_api_setting['ghl_settings_live_secret_key'])?$client_api_setting['ghl_settings_live_secret_key']:'' }}
                                        </div>
                                    </div>

                                </div>





                                <div class="col-md-6">


                                <h5>Sandbox</h5><hr>
                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="ghl_settings_sandbox_client_id">Client ID</label>
                                    <div bis_skin_checked="1">
                                    {{ isset($client_api_setting['ghl_settings_sandbox_client_id'])?$client_api_setting['ghl_settings_sandbox_client_id']:'' }}
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="sandbox_api_key">API Key</label>
                                    <div bis_skin_checked="1">
                                    {{ isset($client_api_setting['ghl_settings_sandbox_api_key'])?$client_api_setting['ghl_settings_sandbox_api_key']:'' }}
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="sandbox_secret_key">Secret Key</label>
                                    <div bis_skin_checked="1">
                                    {{ isset($client_api_setting['ghl_settings_sandbox_secret_key'])?$client_api_setting['ghl_settings_sandbox_secret_key']:'' }}
                                    </div>
                                </div>


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
