@extends('layouts.master')
@section('title') Form Advanced @endsection
@section('css')
<link href="{{URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet">
@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Form Advanced @endslot
    @slot('subtitle') Form @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Colorpicker</h4>
                    <p class="card-title-desc">Examples of Spectrum Colorpicker.</p>

                    <form action="#">
                        <div class="mb-3">
                            <label class="form-label">Simple input field</label>
                            <input type="text" class="form-control" id="colorpicker-default" value="#2D6192">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Show Alpha</label>
                            <input type="text" class="form-control" id="colorpicker-showalpha" value="rgba(244, 106, 106, 0.6)">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Show Palette Only</label>
                            <input type="text" class="form-control" id="colorpicker-showpaletteonly" value="#34c38f">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Toggle Palette Only</label>
                            <input type="text" class="form-control" id="colorpicker-togglepaletteonly" value="#50a5f1">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Show Initial</label>
                            <input type="text" class="form-control" id="colorpicker-showintial" value="#f1b44c">
                        </div>
                        <div>
                            <label class="form-label">Show Input And Initial</label>
                            <input type="text" class="form-control" id="colorpicker-showinput-intial" value="#f46a6a">
                        </div>

                    </form>
                    <!-- end form -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Bootstrap MaxLength</h4>
                    <p class="card-title-desc">This plugin integrates by default with
                        Twitter bootstrap using badges to display the maximum lenght of the
                        field where the user is inserting text. </p>

                    <label>Default usage</label>
                    <p class="text-muted mb-3 font-14">
                        The badge will show up by default when the remaining chars are 10 or less:
                    </p>
                    <input type="text" class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig">

                    <div class="mt-3">
                        <label>Threshold value</label>
                        <p class="text-muted mb-3 font-14">
                            Do you want the badge to show up when there are 20 chars or less? Use the <code>threshold</code> option:
                        </p>
                        <input type="text" maxlength="25" name="thresholdconfig" class="form-control" id="thresholdconfig">
                    </div>

                    <div class="mt-3">
                        <label>All the options</label>
                        <p class="text-muted mb-3 font-14">
                            Please note: if the <code>alwaysShow</code> option is enabled, the <code>threshold</code> option is ignored.
                        </p>
                        <input type="text" class="form-control" maxlength="25" name="alloptions" id="alloptions">
                    </div>

                    <div class="mt-3">
                        <label>Position</label>
                        <p class="text-muted mb-3 font-14">
                            All you need to do is specify the <code>placement</code> option, with one of those strings. If none
                            is specified, the positioning will be defauted to 'bottom'.
                        </p>
                        <input type="text" class="form-control" maxlength="25" name="placement" id="placement">
                    </div>

                    <div class="mt-3">
                        <label>Textarea</label>
                        <p class="text-muted mb-3 font-14">
                            Bootstrap maxlength supports textarea as well as inputs. Even on old IE.
                        </p>
                        <textarea id="textarea" class="form-control" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
                    </div>

                </div>
                <!-- end cradbody -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Css Switch</h4>
                    <p class="card-title-desc">Here are a few types of switches. </p>

                    <div>
                        <input class="form-check form-switch" type="checkbox" id="switch1" checked switch="none">
                        <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>

                        <input class="form-check form-switch" type="checkbox" id="switch2" switch="default" checked>
                        <label class="form-label" for="switch2" data-on-label="" data-off-label=""></label>

                        <input class="form-check form-switch" type="checkbox" id="switch3" switch="bool" checked>
                        <label class="form-label" for="switch3" data-on-label="Yes" data-off-label="No"></label>

                        <input class="form-check form-switch" type="checkbox" id="switch6" switch="primary" checked>
                        <label class="form-label" for="switch6" data-on-label="Yes" data-off-label="No"></label>

                        <input class="form-check form-switch" type="checkbox" id="switch4" switch="success" checked>
                        <label class="form-label" for="switch4" data-on-label="Yes" data-off-label="No"></label>

                        <input class="form-check form-switch" type="checkbox" id="switch7" switch="info" checked>
                        <label class="form-label" for="switch7" data-on-label="Yes" data-off-label="No"></label>

                        <input class="form-check form-switch" type="checkbox" id="switch5" switch="warning" checked>
                        <label class="form-label" for="switch5" data-on-label="Yes" data-off-label="No"></label>

                        <input class="form-check form-switch" type="checkbox" id="switch8" switch="danger" checked>
                        <label class="form-label" for="switch8" data-on-label="Yes" data-off-label="No"></label>

                        <input class="form-check form-switch" type="checkbox" id="switch9" switch="dark" checked>
                        <label class="form-label" for="switch9" data-on-label="Yes" data-off-label="No"></label>

                    </div>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Datepicker</h4>
                    <p class="card-title-desc">Examples of twitter bootstrap datepicker.</p>

                    <form action="#">
                        <div class="mb-3">
                            <label class="form-label">Default Functionality</label>
                            <div class="input-group" id="datepicker1">
                                <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Auto Close</label>
                            <div class="input-group" id="datepicker2">
                                <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true">

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Multiple Date</label>
                            <div class="input-group" id="datepicker3">
                                <input type="text" class="form-control" placeholder="dd M, yyyy" data-provide="datepicker" data-date-container='#datepicker3' data-date-format="dd M, yyyy" data-date-multidate="true">

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Date Range</label>
                            <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                <input type="text" class="form-control" name="start" placeholder="Start Date" />
                                <input type="text" class="form-control" name="end" placeholder="End Date" />
                            </div>
                        </div>

                    </form>
                    <!-- end form -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Bootstrap TouchSpin</h4>
                    <p class="card-title-desc">A mobile and touch friendly input spinner component for Bootstrap</p>

                    <form>
                        <div class="mb-3">
                            <label class="form-label">Using data attributes</label>
                            <input id="demo0" type="text" value="55" name="demo0" data-bts-min="0" data-bts-max="100" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Example with postfix (large)</label>
                            <input id="demo1" type="text" value="55" name="demo1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">With prefix </label>
                            <input id="demo2" type="text" value="0" name="demo2" class=" form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Init with empty value:</label>
                            <input id="demo3" type="text" value="" name="demo3">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Value attribute is not set (applying settings.initval)</label>
                            <input id="demo3_21" type="text" value="" name="demo3_21">
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Value is set explicitly to 33 (skipping settings.initval) </label>
                            <input id="demo3_22" type="text" value="33" name="demo3_22">
                        </div>

                    </form>
                    <!-- end form -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Select2</h4>
                    <p class="card-title-desc">A mobile and touch friendly input spinner component for Bootstrap</p>

                    <form>
                        <div class="mb-3">
                            <label class="form-label">Single Select</label>
                            <select class="form-control select2">
                                <option>Select</option>
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>
                            <!-- end -->
                        </div>
                        <div>
                            <label class="form-label">Multiple Select</label>

                            <select class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>

                        </div>

                    </form>
                    <!-- end form -->
                </div>
            </div>


            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Bootstrap FileStyle</h4>
                    <p class="card-title-desc">Examples of bootstrap fileStyle.</p>

                    <form action="#">
                        <div class="mb-3">
                            <label class="form-label">Default file input</label>
                            <input type="file" class="filestyle" data-buttonname="btn-secondary">
                        </div>

                        <div class="mb-0">
                            <label class="form-label">File style without input</label>
                            <input type="file" class="filestyle" data-input="false" data-buttonname="btn-secondary">
                        </div>

                    </form>
                    <!-- end form -->
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/admin-resources/admin-resources.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
