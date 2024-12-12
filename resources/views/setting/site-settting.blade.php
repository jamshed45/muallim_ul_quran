@extends('layouts.master')
@section('title') Site Setting @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Site Setting @endslot
    @slot('subtitle') <a href="{{ route('settings.index') }}">Setting</a> @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Site Setting</h4>
                    <p class="card-title-desc"></p>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @php
                    $user = auth()->user();
                    $canEdit = $user->can('Admin Site Setting Edit');
                    $canView = $user->can('Admin Site Setting View');
                    $isSuperAdmin = $user->hasRole('Super Admin');
                    $isFormEnabled = $isSuperAdmin || $canEdit;

                    $isSubmitButtonVisible = $isFormEnabled && ($isSuperAdmin || $canEdit);
                    @endphp


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#general" role="tab" aria-selected="true">
                                <span class="d-none d-md-block">General</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#smtp" role="tab" aria-selected="false" tabindex="-1">
                                <span class="d-none d-md-block">SMTP</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                            </a>
                        </li>
                    </ul>


                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-3 active show" id="general" role="tabpanel">

                            <form method="POST" action="{{ route('settings.update', ['setting' => $settingId ?? 1]) }}" @if(!$isFormEnabled) class="permission-disabled-form" @endif enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                            <input type="hidden" name="site_general_setting" value="1" />

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="site_title">Site Title</label>
                                <div bis_skin_checked="1">
                                    <input type="text" class="form-control" name="site_title" id="site_title" value="{{ old('site_title', $settings['site_title'] ?? '') }}" required>
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="admin_email">Email</label>
                                <div bis_skin_checked="1">
                                    <input type="text" class="form-control" name="admin_email" id="admin_email" value="{{ old('admin_email', $settings['admin_email'] ?? '') }}" required>
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="site_logo">⁠Logo ( Desktop )</label>
                                @if(isset($settings['site_logo_desktop']) && $settings['site_logo_desktop'] !='')
                                    <br>
                                    <img src="{{ asset('public/storage/' . $settings['site_logo_desktop']) }}" width="150" alt="Site Desktop Logo" class="img-thumbnail mt-2" style="max-width: 150px;">
                                    <br><br>
                                @endif

                                <div bis_skin_checked="1">
                                    <input type="file" class="form-control" name="site_logo_desktop" id="site_logo_desktop" value="{{ old('site_logo', $settings['site_logo'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="site_logo">⁠Logo ( Mobile )</label>
                                @if(isset($settings['site_logo_mobile']) && $settings['site_logo_mobile'] !='')
                                    <br>
                                    <img src="{{ asset('public/storage/' . $settings['site_logo_mobile']) }}"  width="150" alt="Site Mobile Logo" class="img-thumbnail mt-2" style="max-width: 150px;">
                                    <br><br>
                                @endif

                                <div bis_skin_checked="1">
                                    <input type="file" class="form-control" name="site_logo_mobile" id="site_logo_mobile" value="{{ old('site_logo_mobile', $settings['site_logo_mobile'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="site_logo_icon">⁠Logo Icon</label>
                                @if(isset($settings['site_logo_icon']) && $settings['site_logo_icon'] !='')
                                    <br>
                                    <img src="{{ asset('public/storage/' . $settings['site_logo_icon']) }}"  width="150" alt="Site Logo Icon" class="img-thumbnail mt-2" style="max-width: 150px;">
                                    <br><br>
                                @endif

                                <div bis_skin_checked="1">
                                    <input type="file" class="form-control" name="site_logo_icon" id="site_logo_icon" value="{{ old('site_logo_icon', $settings['site_logo_icon'] ?? '') }}" >
                                </div>
                            </div>


                            <div class="mb-3" bis_skin_checked="1">
                                <label class="form-label" for="site_logo">Favicon</label>
                                @if(isset($settings['site_favicon']) && $settings['site_favicon'] !='' )
                                    <br>
                                    <img src="{{ asset('public/storage/' . $settings['site_favicon']) }}" alt="Site Logo" class="img-thumbnail mt-2" style="max-width: 75px;">
                                    <br><br>
                                @endif

                                <div bis_skin_checked="1">
                                    <input type="file" class="form-control" name="site_favicon" id="site_favicon" value="{{ old('site_favicon', $settings['site_favicon'] ?? '') }}" >
                                </div>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="record_per_page">⁠Record Per page</label>
                                <input type="number" name="record_per_page" id="record_per_page" class="form-control" value="{{ old('record_per_page', $settings['record_per_page'] ?? '') }}" required>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="record_per_page">Enable 2-FA Email OTP</label><br><br>
                                <input class="form-check form-switch" type="checkbox" name="email_otp" id="email_otp" switch="info" value="1" {{ old('email_otp', $settings['email_otp'] ?? 0) ? 'checked' : '' }}  >
                                <label class="form-label" for="email_otp" data-on-label="Yes" data-off-label="No"></label>
                            </div>

                            @if($isSubmitButtonVisible)
                                <div class="col-12" bis_skin_checked="1">
                                    <button class="btn btn-primary" type="submit">Save Setting</button>
                                </div>
                            @endif

                            </form>

                        </div>
                        <div class="tab-pane p-3" id="smtp" role="tabpanel">


                            <form method="POST" action="{{ route('settings.update', ['setting' => $settingId ?? 1]) }}" @if(!$isFormEnabled) class="permission-disabled-form" @endif enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="site_smtp_setting" value="1" />

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="mail_mailer">Mail Mailer</label>
                                <input type="text" name="mail_mailer" id="mail_mailer" class="form-control" value="SMTP" readonly>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="mail_host">Mail Host</label>
                                <input type="text" name="mail_host" id="mail_host" class="form-control" value="{{ old('mail_host', $settings['mail_host'] ?? '') }}"  required>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="mail_port">Mail Port</label>
                                <input type="text" name="mail_port" id="mail_port" class="form-control" value="{{ old('mail_port', $settings['mail_port'] ?? '') }}" required>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="mail_username">Mail Username</label>
                                <input type="text" name="mail_username" id="mail_username" class="form-control" value="{{ old('mail_username', $settings['mail_username'] ?? '') }}" required>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="mail_password">Mail Password</label>
                                <input type="password" name="mail_password" id="mail_password" class="form-control" value="{{ old('mail_password', $settings['mail_password'] ?? '') }}" required>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="mail_encryption">Mail Encryption</label>
                                <select class="form-control" name="mail_encryption" id="mail_encryption" required>
                                    <option value="TLS" {{ $settings['mail_encryption'] == 'TLS' ? 'selected' : '' }}>TLS</option>
                                    <option value="SSL" {{ $settings['mail_encryption'] == 'SSL' ? 'selected' : '' }}>SSL</option>
                                </select>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="mail_from_address">Mail From Address</label>
                                <input type="email" name="mail_from_address" id="mail_from_address" class="form-control" value="{{ old('mail_from_address', $settings['mail_from_address'] ?? '') }}" required>
                            </div>

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="mail_from_name">Mail From Name</label>
                                <input type="text" name="mail_from_name" id="mail_from_name" class="form-control" value="{{ old('mail_from_name', $settings['mail_from_name'] ?? '') }}" required>
                            </div>

                            @if($isSubmitButtonVisible)
                            <div class="col-12" bis_skin_checked="1">
                                <button class="btn btn-primary" type="submit">Save Setting</button>
                            </div>
                            @endif
                            </form>

                        </div>

                    </div>








                </div>
            </div>

        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')



    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
