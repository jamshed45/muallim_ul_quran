@extends('layouts.master')
@section('title') D-Flo Setting @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') D-Flo Setting @endslot
    @slot('subtitle') <a href="{{ route('settings.index') }}">Setting</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">D-Flo Setting</h4>
                    <p class="card-title-desc"></p>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @php
                    $user = auth()->user();
                    $canEdit = $user->can('Admin D Flo Setting Edit');
                    $canView = $user->can('Admin D Flo Setting View');
                    $isSuperAdmin = $user->hasRole('Super Admin');
                    $isFormEnabled = $isSuperAdmin || $canEdit;

                    $isSubmitButtonVisible = $isFormEnabled && ($isSuperAdmin || $canEdit);
                    @endphp

                    <form method="POST" action="{{ route('settings.update', ['setting' => $settingId ?? 1]) }}"  @if(!$isFormEnabled) class="permission-disabled-form" @endif>
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="dflo_setting" value="1" />

                        <div class="row mb-5">

                            <div class="col-md-4">
                                <label  class="form-label" for="d_flo_practice_live_mode_toggle">Live Mode</label><br>
                                <input class="form-check form-switch" type="checkbox" name="admin_d_flo_live_mode_toggle"  id="admin_d_flo_live_mode_toggle" switch="info" value="1" {{ isset($settings['admin_d_flo_live_mode_toggle']) && $settings['admin_d_flo_live_mode_toggle'] == 1 ? 'checked' : '' }} >
                                <label class="form-label" for="admin_d_flo_live_mode_toggle" data-on-label="Yes" data-off-label="No"></label>
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label" for="admin_d_flo_sandbox_mode_toggle">SandBox Mode</label><br>
                                <input class="form-check form-switch" type="checkbox" name="admin_d_flo_sandbox_mode_toggle"  id="admin_d_flo_sandbox_mode_toggle" switch="info" value="1" {{ isset($settings['admin_d_flo_sandbox_mode_toggle']) ? ($settings['admin_d_flo_sandbox_mode_toggle'] == 1 ? 'checked' : '') : 'checked' }} >
                                <label class="form-label" for="admin_d_flo_sandbox_mode_toggle" data-on-label="Yes" data-off-label="No"></label>
                            </div>

                            <div class="col-md-4">
                                <label  class="form-label" for="admin_d_flo_trigger_request_toggle">Trigger Request</label><br>
                                <input class="form-check form-switch" type="checkbox" name="admin_d_flo_trigger_request_toggle"  id="admin_d_flo_trigger_request_toggle" switch="info" value="1" {{ isset($settings['admin_d_flo_trigger_request_toggle']) && $settings['admin_d_flo_trigger_request_toggle'] == 1 ? 'checked' : '' }} >
                                <label class="form-label " for="admin_d_flo_trigger_request_toggle" data-on-label="Yes" data-off-label="No"></label>
                            </div>

                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="admin_return_url">Return URL</label>
                            <div bis_skin_checked="1">
                            <input type="url" class="form-control" name="d_flo_admin_return_url" id="d_flo_admin_return_url" value="{{ old('d_flo_admin_return_url', $settings['d_flo_admin_return_url'] ?? '') }}" >
                            </div>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="corepractice_live_locationId">SandBox URL</label>
                            <div bis_skin_checked="1">
                            <input type="url" class="form-control" name="d_flo_admin_sandbox_url" id="d_flo_admin_sandbox_url" value="{{ old('corepractice[d_flo_admin_sandbox_url]', $settings['d_flo_admin_sandbox_url'] ?? '') }}" >
                            </div>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="d_flo_all_per_minute_per_client">Call Per Minute / Per Client</label>
                            <div bis_skin_checked="1">
                            <input type="number" class="form-control" max="100" name="d_flo_all_per_minute_per_client" id="d_flo_all_per_minute_per_client" value="{{ old('d_flo_all_per_minute_per_client', $settings['d_flo_all_per_minute_per_client'] ?? '') }}" >

                            </div>
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="d_flo_call_per_day_per_client">Call Per Day / Per Client</label>
                            <div bis_skin_checked="1">
                            <input type="number" class="form-control" max="200000" name="d_flo_call_per_day_per_client" id="d_flo_call_per_day_per_client" value="{{ old('d_flo_call_per_day_per_client', $settings['d_flo_call_per_day_per_client'] ?? '') }}" >
                            </div>
                        </div>

                        @if($isSubmitButtonVisible)
                        <div class="col-12" bis_skin_checked="1">
                            <button class="btn btn-primary" type="submit">Save Setting</button>
                        </div>
                        @endif

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const liveModeToggle = document.getElementById('admin_d_flo_live_mode_toggle');
            const sandboxModeToggle = document.getElementById('admin_d_flo_sandbox_mode_toggle');


            function liveToggle() {

                if (liveModeToggle.checked) {
                    sandboxModeToggle.checked = false;
                } else {
                    sandboxModeToggle.checked = true;
                }

            }

            function sandboxhandleToggle() {

                if (sandboxModeToggle.checked) {
                    liveModeToggle.checked = false;
                } else {
                    liveModeToggle.checked = true;
                }

            }


            liveModeToggle.addEventListener('change', liveToggle);
            sandboxModeToggle.addEventListener('change', sandboxhandleToggle);
        });
        </script>



    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
