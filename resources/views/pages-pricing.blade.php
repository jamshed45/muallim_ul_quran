@extends('layouts.master')
@section('title') Pricing @endsection
@section('css')
<link href="{{URL::asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">
@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Pricing @endslot
    @slot('subtitle') Extra Pages @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card pricing-box">
                <div class="card-body p-4">
                    <div class="d-flex mt-2">
                        <div class="flex-shrink-0 align-self-center">
                            <i class="ion ion-ios-airplane h2"></i>
                        </div>
                        <div class="flex-grow-1 ms-auto text-end">
                            <h4>Starter</h4>
                            <p class="text-muted mb-0">Sed ut neque unde</p>
                        </div>
                    </div>
                    <div class="pricing-features mt-5 pt-2">
                        <p><i class="mdi mdi-check text-primary me-2"></i> Free Live Support</p>
                        <p><i class="mdi mdi-check text-primary me-2"></i> Unlimited User</p>
                        <p><i class="mdi mdi-check text-primary me-2"></i> No Time Tracking</p>
                        <p><i class="mdi mdi-close text-primary me-2"></i> Free Setup</p>
                    </div>
                    <div class="text-center mt-5">
                        <h1 class="mb-0"><sup><small>$</small></sup>19/<span class="font-size-16">Per month</span></h1>
                    </div>
                    <div class="d-grid mt-5">
                        <a href="#" class="btn btn-primary waves-effect waves-light">Sign up Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card pricing-box">
                <div class="card-body p-4">
                    <div class="d-flex mt-2">
                        <div class="flex-shrink-0 align-self-center">
                            <i class="ion ion-ios-trophy h2"></i>
                        </div>
                        <div class="flex-grow-1 ms-auto text-end">
                            <h4>Professional</h4>
                            <p class="text-muted mb-0">Sed ut neque unde</p>
                        </div>
                    </div>
                    <div class="pricing-features mt-5 pt-2">
                        <p><i class="mdi mdi-check text-primary me-2"></i> Free Live Support</p>
                        <p><i class="mdi mdi-check text-primary me-2"></i> Unlimited User</p>
                        <p><i class="mdi mdi-check text-primary me-2"></i> No Time Tracking</p>
                        <p><i class="mdi mdi-close text-primary me-2"></i> Free Setup</p>
                    </div>
                    <div class="text-center mt-5">
                        <h1 class="mb-0"><sup><small>$</small></sup>29/<span class="font-size-16">Per month</span></h1>
                    </div>
                    <div class="d-grid mt-5">
                        <a href="#" class="btn btn-primary waves-effect waves-light">Sign up Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card pricing-box">
                <div class="card-body p-4">
                    <div class="d-flex mt-2">
                        <div class="flex-shrink-0 align-self-center">
                            <i class="ion ion-ios-umbrella h2"></i>
                        </div>
                        <div class="flex-grow-1 ms-auto text-end">
                            <h4>Enterprise</h4>
                            <p class="text-muted mb-0">Sed ut neque unde</p>
                        </div>
                    </div>
                    <div class="pricing-features mt-5 pt-2">
                        <p><i class="mdi mdi-check text-primary me-2"></i> Free Live Support</p>
                        <p><i class="mdi mdi-check text-primary me-2"></i> Unlimited User</p>
                        <p><i class="mdi mdi-check text-primary me-2"></i> No Time Tracking</p>
                        <p><i class="mdi mdi-close text-primary me-2"></i> Free Setup</p>
                    </div>
                    <div class="text-center mt-5">
                        <h1 class="mb-0"><sup><small>$</small></sup>39/<span class="font-size-16">Per month</span></h1>
                    </div>
                    <div class="d-grid mt-5">
                        <a href="#" class="btn btn-primary waves-effect waves-light">Sign up Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card pricing-box">
                <div class="card-body p-4">
                    <div class="d-flex mt-2">
                        <div class="flex-shrink-0 align-self-center">
                            <i class="ion ion-ios-cube h2"></i>
                        </div>
                        <div class="flex-grow-1 ms-auto text-end">
                            <h4>Unlimited</h4>
                            <p class="text-muted mb-0">Sed ut neque unde</p>
                        </div>
                    </div>
                    <div class="pricing-features mt-5 pt-2">
                        <p><i class="mdi mdi-check text-primary me-2"></i> Free Live Support</p>
                        <p><i class="mdi mdi-check text-primary me-2"></i> Unlimited User</p>
                        <p><i class="mdi mdi-check text-primary me-2"></i> No Time Tracking</p>
                        <p><i class="mdi mdi-close text-primary me-2"></i> Free Setup</p>
                    </div>
                    <div class="text-center mt-5">
                        <h1 class="mb-0"><sup><small>$</small></sup>49/<span class="font-size-16">Per month</span></h1>
                    </div>
                    <div class="d-grid mt-5">
                        <a href="#" class="btn btn-primary waves-effect waves-light">Sign up Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->

    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
