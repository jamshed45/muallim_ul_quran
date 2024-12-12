@extends('layouts.master')
@section('title') Core Practice Setting @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Client Setting @endslot
    @slot('subtitle') <a href="{{ route('settings.index') }}">Setting</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col-md-8">
                            <h4 class="card-title">Client Setting</h4>
                        </div>
                        <div class="col-md-2 pt-2" style="text-align:right;">
                            <b>Client :</b>
                        </div>
                        <div class="col-md-2">

                            <select class="form-control">
                                <option>Client XYZ</option>
                            </select>
                        </div>
                    </div>

                    <p class="card-title-desc"></p>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif


                    <form method="POST" action="{{ route('settings.update', ['setting' => $settingId ?? 1]) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="corepractice_setting" value="1" />


{{--
                    <div class="row">
                        <div class="col-md-6">
                            <label  class="form-label" for="core_practice_live_mode">Live Mode</label><br>
                            <input class="form-check form-switch" type="checkbox"  id="core_practice_live_mode_toggle" switch="info" value="1"  {{ $disabled }} {{ $isLiveModeChecked }} >
                            <label class="form-label {{ $checkboxOpacity }}" for="core_practice_live_mode_toggle" data-on-label="Yes" data-off-label="No"></label>

                            <input  type="hidden" name="core_practice_live_mode" id="core_practice_live_mode"  value="{{ $core_practice_live_mode }}" >

                        </div>
                        <div class="col-md-6">

                            <label  class="form-label" for="core_practice_trigger_request">Trigger Request</label><br>
                            <input class="form-check form-switch" type="checkbox" name="core_practice_trigger_request"  id="core_practice_trigger_request" switch="info" {{ $core_practice_trigger_request == 1 ? 'checked' : '' }} value="1"   >
                            <label class="form-label " for="core_practice_trigger_request" data-on-label="Yes" data-off-label="No"></label>



                        </div>
                    </div> --}}

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab1" aria-selected="true">
                                <span class="d-none d-md-block">General</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab2" aria-selected="false" tabindex="-1">
                                <span class="d-none d-md-block">API</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">


                        <div class="tab-pane p-3 active show" id="tab1" role="tabpanel">

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="Name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" autocomplete="off webauthn" required>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="profile_image">Profile Image</label>
                                <input type="file" class="form-control" name="profile_image" id="profile_image" value="">

                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="password">Password  <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="password_confirmation">Status <span class="text-danger">*</span></label>
                                <select class="form-control">
                                    <option>Active</option>
                                </select>
                            </div>

                        </div>

                        <div class="tab-pane p-3" id="tab2" role="tabpanel">
                            <h4>Live</h4><hr>
                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_calenderId">Client ID</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_sandbox_mode[calenderId]" id="corepractice_sandbox_calenderId" value="{{ old('corepractice[calenderId]', $sandbox_settings['calenderId'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_locationId">API Key</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_sandbox_mode[locationId]" id="corepractice_sandbox_locationId" value="{{ old('corepractice[locationId]', $sandbox_settings['locationId'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_providerId">Secret Key</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_sandbox_mode[providerId]" id="corepractice_sandbox_providerId" value="{{ old('corepractice[providerId]', $sandbox_settings['providerId'] ?? '') }}" >
                                </div>
                            </div>

                            <h4>Sandbox</h4><hr>
                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_calenderId">Client ID</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_sandbox_mode[calenderId]" id="corepractice_sandbox_calenderId" value="{{ old('corepractice[calenderId]', $sandbox_settings['calenderId'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_locationId">API Key</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_sandbox_mode[locationId]" id="corepractice_sandbox_locationId" value="{{ old('corepractice[locationId]', $sandbox_settings['locationId'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_providerId">Secret Key</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_sandbox_mode[providerId]" id="corepractice_sandbox_providerId" value="{{ old('corepractice[providerId]', $sandbox_settings['providerId'] ?? '') }}" >
                                </div>
                            </div>


                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="core_practice_trigger_request">Live Mode</label><br>
                                <input class="form-check form-switch" type="checkbox" name="core_practice_trigger_request" id="core_practice_trigger_request" switch="info" checked="" value="1">
                                <label class="form-label " for="core_practice_trigger_request" data-on-label="Yes" data-off-label="No"></label>
                            </div>



                        </div>



                    </div>







                        <div class="col-12" bis_skin_checked="1">
                            <button class="btn btn-primary" type="submit">Save Setting</button>
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection

