@extends('layouts.master')
@section('title') Core Practice Setting @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Core Practice Setting @endslot
    @slot('subtitle') <a href="{{ route('settings.index') }}">Setting</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Core Practice Setting</h4>
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
                        @php
                            // echo "<pre>";
                            //     print_r($settings);
                            // echo "</pre>";

                            if (isset($settings['corepractice_live_mode'])) {
                                $live_settings = (array) json_decode($settings['corepractice_live_mode']); }
                            else {
                                $live_settings = array(); }

                            if (isset($settings['corepractice_sandbox_mode'])) {
                                $sandbox_settings = (array) json_decode($settings['corepractice_sandbox_mode']); }
                            else {
                                $sandbox_settings = array(); }


                            $get_live_settings_array = [
                            '1' => isset($live_settings['calenderId'])?$live_settings['calenderId']:'',
                            '2' => isset($live_settings['locationId'])?$live_settings['locationId']:'',
                            '3' => isset($live_settings['providerId'])?$live_settings['providerId']:'',
                            '4' => isset($live_settings['URL'])?$live_settings['URL']:'',
                            '5' => isset($live_settings['callPerMinute'])?$live_settings['callPerMinute']:'',
                            '6' => isset($live_settings['callPerDay'])?$live_settings['callPerDay']:'',
                            ];



                            $liveCount = count(array_filter($get_live_settings_array, function($value) {
                            return !empty($value);
                            }));

                            $get_sandbox_settings_array = [
                            '1' => isset($sandbox_settings['calenderId'])?$sandbox_settings['calenderId']:'',
                            '2' => isset($sandbox_settings['locationId'])?$sandbox_settings['locationId']:'',
                            '3' => isset($sandbox_settings['providerId'])?$sandbox_settings['providerId']:'',
                            '4' => isset($sandbox_settings['URL'])?$sandbox_settings['URL']:'',
                            '5' => isset($sandbox_settings['callPerMinute'])?$sandbox_settings['callPerMinute']:'',
                            '6' => isset($sandbox_settings['callPerDay'])?$sandbox_settings['callPerDay']:'',
                            ];

                            $sandboxCount = count(array_filter($get_sandbox_settings_array, function($value) {
                            return !empty($value);
                            }));

                            $core_practice_live_mode = isset($settings['core_practice_live_mode'])?$settings['core_practice_live_mode']:0;
                            $core_practice_trigger_request = isset($settings['core_practice_trigger_request'])?$settings['core_practice_trigger_request']:0;


                            if($liveCount == 6 && $sandboxCount != 6){

                                    if($core_practice_live_mode == 1 || $liveCount == 6)
                                    {
                                        $isLiveModeChecked  = 'checked';
                                    }
                                    else
                                    {
                                        $isLiveModeChecked  = '';
                                    }
                                    // if($core_practice_live_mode)
                                    // {
                                    //     $isTriggerRequestLiveModeChecked  = 'checked';
                                    // }
                                    // else
                                    // {
                                    //     $isTriggerRequestLiveModeChecked  = '';
                                    // }
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

                                    if($core_practice_live_mode == 1)
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
                                <label class="form-label" for="corepractice_live_calenderId">Calender ID</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_live_mode[calenderId]" id="corepractice_live_calenderId" value="{{ old('corepractice[calenderId]', $live_settings['calenderId'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_live_locationId">Location ID</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_live_mode[locationId]" id="corepractice_live_locationId" value="{{ old('corepractice[locationId]', $live_settings['locationId'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_live_providerId">Provider ID</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_live_mode[providerId]" id="corepractice_live_providerId" value="{{ old('corepractice[providerId]', $live_settings['providerId'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_live_url">Live URL</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_live_mode[URL]" id="corepractice_live_url" value="{{ old('corepractice[URL]', $live_settings['URL'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_live_callPerMinute">Call Per Minute</label>
                                <div bis_skin_checked="1">
                                <input type="number" class="form-control" max="20" name="corepractice_live_mode[callPerMinute]" id="corepractice_live_callPerMinute" value="{{ old('corepractice[callPerMinute]', $live_settings['callPerMinute'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_live_callPerMinute">Call Per Day</label>
                                <div bis_skin_checked="1">
                                <input type="number" class="form-control" max="2000" name="corepractice_live_mode[callPerDay]" id="corepractice_live_callPerDay" value="{{ old('corepractice[callPerDay]', $live_settings['callPerDay'] ?? '') }}" >
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane p-3" id="tab2" role="tabpanel">

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_calenderId">Calender ID</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_sandbox_mode[calenderId]" id="corepractice_sandbox_calenderId" value="{{ old('corepractice[calenderId]', $sandbox_settings['calenderId'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_locationId">Location ID</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_sandbox_mode[locationId]" id="corepractice_sandbox_locationId" value="{{ old('corepractice[locationId]', $sandbox_settings['locationId'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_providerId">Provider ID</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_sandbox_mode[providerId]" id="corepractice_sandbox_providerId" value="{{ old('corepractice[providerId]', $sandbox_settings['providerId'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_url">Sandbox URL</label>
                                <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="corepractice_sandbox_mode[URL]" id="corepractice_sandbox_url" value="{{ old('corepractice[URL]', $sandbox_settings['URL'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_callPerMinute">Call Per Minute</label>
                                <div bis_skin_checked="1">
                                <input type="number" class="form-control" max="20" name="corepractice_sandbox_mode[callPerMinute]" id="corepractice_sandbox_callPerMinute" value="{{ old('corepractice[callPerMinute]', $sandbox_settings['callPerMinute'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="corepractice_sandbox_callPerMinute">Call Per Day</label>
                                <div bis_skin_checked="1">
                                <input type="number" class="form-control" max="2000" name="corepractice_sandbox_mode[callPerDay]" id="corepractice_sandbox_callPerDay" value="{{ old('corepractice[callPerDay]', $sandbox_settings['callPerDay'] ?? '') }}" >
                                </div>
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
    @section('scripts')

    <script>

        function updatecore_practice_live_mode() {
            const switchElement = document.getElementById('core_practice_live_mode_toggle');
            const core_practice_live_mode = document.getElementById('core_practice_live_mode');

            core_practice = switchElement.checked ? '1' : '0';

            core_practice_live_mode.value = core_practice
        }

        window.addEventListener('load', function() {
            updatecore_practice_live_mode();
        });

        document.getElementById('core_practice_live_mode_toggle').addEventListener('change', function() {
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
