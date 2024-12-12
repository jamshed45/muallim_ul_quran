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
                    <form method="POST" action="{{ route('settings.update', ['setting' => $settingId ?? 1]) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="dflo_setting" value="1" />
                        @php

                            if (isset($settings['dflo_live_mode'])) {
                                $live_settings = (array) json_decode($settings['dflo_live_mode']); }
                            else {
                                $live_settings = array(); }

                            if (isset($settings['dflo_sandbox_mode'])) {
                                $sandbox_settings = (array) json_decode($settings['dflo_sandbox_mode']); }
                            else {
                                $sandbox_settings = array(); }


                            $get_live_settings_array = [
                                '1' => isset($live_settings['userId'])?$live_settings['userId']:'',
                                '2' => isset($live_settings['locationId'])?$live_settings['locationId']:'',
                                '3' => isset($live_settings['companyId'])?$live_settings['companyId']:'',
                                '4' => isset($live_settings['URL'])?$live_settings['URL']:'',
                                '5' => isset($live_settings['callPerMinute'])?$live_settings['callPerMinute']:'',
                                '6' => isset($live_settings['callPerDay'])?$live_settings['callPerDay']:'',
                            ];

                            $liveCount = count(array_filter($get_live_settings_array, function($value) {
                            return !empty($value);
                            }));

                            $get_sandbox_settings_array = [
                                '1' => isset($sandbox_settings['userId'])?$sandbox_settings['userId']:'',
                                '2' => isset($sandbox_settings['locationId'])?$sandbox_settings['locationId']:'',
                                '3' => isset($sandbox_settings['companyId'])?$sandbox_settings['companyId']:'',
                                '4' => isset($sandbox_settings['URL'])?$sandbox_settings['URL']:'',
                                '5' => isset($sandbox_settings['callPerMinute'])?$sandbox_settings['callPerMinute']:'',
                                '6' => isset($sandbox_settings['callPerDay'])?$sandbox_settings['callPerDay']:'',
                            ];

                            $sandboxCount = count(array_filter($get_sandbox_settings_array, function($value) {
                            return !empty($value);
                            }));

                            $de_flo_live_mode = isset($settings['de_flo_live_mode'])?$settings['de_flo_live_mode']:0;
                            $de_flo_trigger_request = isset($settings['de_flo_trigger_request'])?$settings['de_flo_trigger_request']:0;

                            if($liveCount == 6 && $sandboxCount != 6){

                                if($de_flo_live_mode == 1)
                                {
                                    $isLiveModeChecked  = 'checked';
                                }
                                else
                                {
                                    $isLiveModeChecked  = '';
                                }

                                $disabled   = 'disabled';
                                $checkboxOpacity = 'opacity-50';

                                }
                                else if($liveCount != 6 && $sandboxCount == 6){


                                $isLiveModeChecked  = '';
                                // $isTriggerRequestLiveModeChecked = '';
                                $disabled   = 'disabled';
                                $checkboxOpacity = 'opacity-50';

                                }
                                else if($liveCount == 6 && $sandboxCount == 6){

                                if($de_flo_live_mode == 1)
                                    {
                                        $isLiveModeChecked  = 'checked';
                                    }
                                    else
                                    {
                                        $isLiveModeChecked  = '';
                                    }

                                // $isTriggerRequestLiveModeChecked  = 'checked';
                                $disabled   = '';
                                $checkboxOpacity = '';

                                }
                                else {

                                $isLiveModeChecked  = '';
                                // $isTriggerRequestLiveModeChecked  = '';
                                $disabled   = 'disabled';
                                $checkboxOpacity = 'opacity-50';

                            }




                        @endphp


                        <div class="row">
                            <div class="col-md-6">
                                <label  class="form-label" for="de_flo_live_mode_toggle">Live Mode</label><br>
                                <input class="form-check form-switch" type="checkbox" name="de_flo_live_mode_toggle" id="de_flo_live_mode_toggle" switch="info" value="1" {{ $disabled }} {{ $isLiveModeChecked }} >
                                <label class="form-label {{ $checkboxOpacity }}" for="de_flo_live_mode_toggle" data-on-label="Yes" data-off-label="No"></label>

                                <input  type="hidden" name="de_flo_live_mode" id="de_flo_live_mode"  value="{{ $de_flo_live_mode }}" >
                            </div>
                            <div class="col-md-6">

                                <label  class="form-label" for="de_flo_trigger_request">Trigger Request</label><br>
                                <input class="form-check form-switch" type="checkbox" name="de_flo_trigger_request" id="de_flo_trigger_request" switch="info" value="1" {{ old('de_flo_trigger_request', $settings['de_flo_trigger_request'] ?? 0) ? 'checked' : '' }}  >
                                <label class="form-label" for="de_flo_trigger_request" data-on-label="Yes" data-off-label="No"></label>
                            </div>
                        </div>


                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab1" aria-selected="true">
                                    <span class="d-none d-md-block">Live</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab2" aria-selected="false" tabindex="-1">
                                    <span class="d-none d-md-block">SandBox</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                </a>
                            </li>
                        </ul>


                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane p-3 active show" id="tab1" role="tabpanel">

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_userId">User ID</label>
                                    <div bis_skin_checked="1">
                                    <input type="text" class="form-control" name="dflo_live_mode[userId]" id="dflo_userId" value="{{ old('dflo_live_mode[userId]', $live_settings['userId'] ?? '') }}" >
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_locationId">Location ID</label>
                                    <div bis_skin_checked="1">
                                    <input type="text" class="form-control" name="dflo_live_mode[locationId]" id="dflo_locationId" value="{{ old('dflo_live_mode[locationId]', $live_settings['locationId'] ?? '') }}" >
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_companyId">Company ID</label>
                                    <div bis_skin_checked="1">
                                    <input type="text" class="form-control" name="dflo_live_mode[companyId]" id="dflo_companyId" value="{{ old('dflo_live_mode[companyId]', $live_settings['companyId'] ?? '') }}" >
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_live_url">Live URL</label>
                                    <div bis_skin_checked="1">
                                    <input type="text" class="form-control" name="dflo_live_mode[URL]" id="dflo_live_url" value="{{ old('dflo_live_mode[URL]', $live_settings['URL'] ?? '') }}" >
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_callPerMinute">Call Per Minute</label>
                                    <div bis_skin_checked="1">
                                    <input type="number" class="form-control" max="20" name="dflo_live_mode[callPerMinute]" id="dflo_callPerMinute" value="{{ old('dflo_live_mode[callPerMinute]', $live_settings['callPerMinute'] ?? '') }}" >

                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_callPerMinute">Call Per Day</label>
                                    <div bis_skin_checked="1">
                                    <input type="number" class="form-control" max="2000" name="dflo_live_mode[callPerDay]" id="dflo_callPerDay" value="{{ old('dflo_live_mode[callPerDay]', $live_settings['callPerDay'] ?? '') }}" >
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane p-3" id="tab2" role="tabpanel">

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_userId">User ID</label>
                                    <div bis_skin_checked="1">
                                    <input type="text" class="form-control" name="dflo_sandbox_mode[userId]" id="dflo_userId" value="{{ old('dflo_sandbox_mode[userId]', $sandbox_settings['userId'] ?? '') }}" >
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_locationId">Location ID</label>
                                    <div bis_skin_checked="1">
                                    <input type="text" class="form-control" name="dflo_sandbox_mode[locationId]" id="dflo_locationId" value="{{ old('dflo_sandbox_mode[locationId]', $sandbox_settings['locationId'] ?? '') }}" >
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_companyId">Company ID</label>
                                    <div bis_skin_checked="1">
                                    <input type="text" class="form-control" name="dflo_sandbox_mode[companyId]" id="dflo_companyId" value="{{ old('dflo_sandbox_mode[companyId]', $sandbox_settings['companyId'] ?? '') }}">
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_sandbox_url">Sandbox URL</label>
                                    <div bis_skin_checked="1">
                                    <input type="text" class="form-control" name="dflo_sandbox_mode[URL]" id="dflo_sandbox_url" value="{{ old('dflo_sandbox_mode[URL]', $sandbox_settings['URL'] ?? '') }}">
                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_callPerMinute">Call Per Minute</label>
                                    <div bis_skin_checked="1">
                                    <input type="number" class="form-control" max="20" name="dflo_sandbox_mode[callPerMinute]" id="dflo_callPerMinute" value="{{ old('dflo_sandbox_mode[callPerMinute]', $sandbox_settings['callPerMinute'] ?? '') }}">

                                    </div>
                                </div>

                                <div class="mb-3" bis_skin_checked="1">
                                    <label class="form-label" for="dflo_callPerMinute">Call Per Day</label>
                                    <div bis_skin_checked="1">
                                    <input type="number" class="form-control" max="2000" name="dflo_sandbox_mode[callPerDay]" id="dflo_callPerDay" value="{{ old('dflo_sandbox_mode[callPerDay]', $sandbox_settings['callPerDay'] ?? '') }}">
                                    </div>
                                </div>


                            </div>



                        </div?>




                        <div class="col-12" bis_skin_checked="1">
                            <button class="btn btn-primary" type="submit">Save Setting</button>
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')


    <script>

        function updatecore_practice_live_mode() {
            const switchElement = document.getElementById('de_flo_live_mode_toggle');
            const core_practice_live_mode = document.getElementById('de_flo_live_mode');

            core_practice = switchElement.checked ? '1' : '0';

            core_practice_live_mode.value = core_practice
        }

        window.addEventListener('load', function() {
            updatecore_practice_live_mode();
        });

        document.getElementById('de_flo_live_mode_toggle').addEventListener('change', function() {
            updatecore_practice_live_mode();
        });



        // function update_core_practice_trigger_request() {

        //     const switchElement = document.getElementById('core_practice_trigger_request_toggle');
        //     const core_practice_live_mode = document.getElementById('core_practice_trigger_request');

        //     core_practice_live_mode.value = switchElement.checked ? '1' : '0';

        // }


        // document.getElementById('core_practice_trigger_request_toggle').addEventListener('change', function() {
        //     update_core_practice_trigger_request();
        // });

    </script>



    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
