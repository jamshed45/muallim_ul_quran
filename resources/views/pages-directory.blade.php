@extends('layouts.master')
@section('title') Directory @endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Directory @endslot
    @slot('subtitle') Extra Pages @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card directory-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{URL::asset('assets/images/users/user-2.jpg')}}" alt="" class="img-fluid img-thumbnail rounded-circle avatar-lg">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary font-size-18 mb-1">Jerome A. Hebert</h5>
                            <p class="font-size-12 mb-2">Creative Director</p>
                            <p class="mb-0">Jerome@veltrix.com</p>
                        </div>
                        <ul class="list-unstyled social-links ms-auto">
                            <li><a href="#" class="btn-primary"><i class="mdi mdi-facebook"></i></a></li>
                            <li><a href="#" class="btn-info"><i class="mdi mdi-twitter"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                    <p class="mb-0"><b>Intro : </b>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis atque corrupti quos dolores et... <a href="#" class="text-primary"> Read More</a></p>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-4 col-md-6">
            <div class="card directory-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{URL::asset('assets/images/users/user-3.jpg')}}" alt="" class="img-fluid img-thumbnail rounded-circle avatar-lg">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary font-size-18 mb-1">Adam V. Acker</h5>
                            <p class="font-size-12 mb-2">Creative Director</p>
                            <p class="mb-0">Adam@veltrix.com</p>
                        </div>
                        <ul class="list-unstyled social-links ms-auto">
                            <li><a href="#" class="btn-primary"><i class="mdi mdi-facebook"></i></a></li>
                            <li><a href="#" class="btn-info"><i class="mdi mdi-twitter"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                    <p class="mb-0"><b>Intro : </b>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis atque corrupti quos dolores et... <a href="#" class="text-primary"> Read More</a></p>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-4 col-md-6">
            <div class="card directory-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{URL::asset('assets/images/users/user-4.jpg')}}" alt="" class="img-fluid img-thumbnail rounded-circle avatar-lg">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary font-size-18 mb-1">Stanley M. Dyke</h5>
                            <p class="font-size-12 mb-2">Creative Director</p>
                            <p class="mb-0">Stanley@veltrix.com</p>
                        </div>
                        <ul class="list-unstyled social-links ms-auto">
                            <li><a href="#" class="btn-primary"><i class="mdi mdi-facebook"></i></a></li>
                            <li><a href="#" class="btn-info"><i class="mdi mdi-twitter"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                    <p class="mb-0"><b>Intro : </b>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis atque corrupti quos dolores et... <a href="#" class="text-primary"> Read More</a></p>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-4 col-md-6">
            <div class="card directory-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{URL::asset('assets/images/users/user-5.jpg')}}" alt="" class="img-fluid img-thumbnail rounded-circle avatar-lg">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary font-size-18 mb-1">Ben J. Mathison</h5>
                            <p class="font-size-12 mb-2">Creative Director</p>
                            <p class="mb-0">Ben@veltrix.com</p>
                        </div>
                        <ul class="list-unstyled social-links ms-auto">
                            <li><a href="#" class="btn-primary"><i class="mdi mdi-facebook"></i></a></li>
                            <li><a href="#" class="btn-info"><i class="mdi mdi-twitter"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                    <p class="mb-0"><b>Intro : </b>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis atque corrupti quos dolores et... <a href="#" class="text-primary"> Read More</a></p>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-4 col-md-6">
            <div class="card directory-card">

                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{URL::asset('assets/images/users/user-6.jpg')}}" alt="" class="img-fluid img-thumbnail rounded-circle avatar-lg">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary font-size-18 mb-1">John V. Bailey</h5>
                            <p class="font-size-12 mb-2">Creative Director</p>
                            <p class="mb-0">John@veltrix.com</p>
                        </div>
                        <ul class="list-unstyled social-links ms-auto">
                            <li><a href="#" class="btn-primary"><i class="mdi mdi-facebook"></i></a></li>
                            <li><a href="#" class="btn-info"><i class="mdi mdi-twitter"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                    <p class="mb-0"><b>Intro : </b>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis atque corrupti quos dolores et... <a href="#" class="text-primary"> Read More</a></p>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-4 col-md-6">
            <div class="card directory-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{URL::asset('assets/images/users/user-7.jpg')}}" alt="" class="img-fluid img-thumbnail rounded-circle avatar-lg">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary font-size-18 mb-1">Antonio J. Thomas</h5>
                            <p class="font-size-12 mb-2">Creative Director</p>
                            <p class="mb-0">Antonio@veltrix.com</p>
                        </div>
                        <ul class="list-unstyled social-links ms-auto">
                            <li><a href="#" class="btn-primary"><i class="mdi mdi-facebook"></i></a></li>
                            <li><a href="#" class="btn-info"><i class="mdi mdi-twitter"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                    <p class="mb-0"><b>Intro : </b>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis atque corrupti quos dolores et... <a href="#" class="text-primary"> Read More</a></p>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-4 col-md-6">
            <div class="card directory-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{URL::asset('assets/images/users/user-8.jpg')}}" alt="" class="img-fluid img-thumbnail rounded-circle avatar-lg">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary font-size-18 mb-1">Jerome A. Hebert</h5>
                            <p class="font-size-12 mb-2">Creative Director</p>
                            <p class="mb-0">Jerome@veltrix.com</p>
                        </div>
                        <ul class="list-unstyled social-links ms-auto">
                            <li><a href="#" class="btn-primary"><i class="mdi mdi-facebook"></i></a></li>
                            <li><a href="#" class="btn-info"><i class="mdi mdi-twitter"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                    <p class="mb-0"><b>Intro : </b>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis atque corrupti quos dolores et... <a href="#" class="text-primary"> Read More</a></p>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-4 col-md-6">
            <div class="card directory-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{URL::asset('assets/images/users/user-9.jpg')}}" alt="" class="img-fluid img-thumbnail rounded-circle avatar-lg">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary font-size-18 mb-1">Adam V. Acker</h5>
                            <p class="font-size-12 mb-2">Creative Director</p>
                            <p class="mb-0">Adam@veltrix.com</p>
                        </div>
                        <ul class="list-unstyled social-links ms-auto">
                            <li><a href="#" class="btn-primary"><i class="mdi mdi-facebook"></i></a></li>
                            <li><a href="#" class="btn-info"><i class="mdi mdi-twitter"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                    <p class="mb-0"><b>Intro : </b>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis atque corrupti quos dolores et... <a href="#" class="text-primary"> Read More</a></p>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-4 col-md-6">
            <div class="card directory-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{URL::asset('assets/images/users/user-10.jpg')}}" alt="" class="img-fluid img-thumbnail rounded-circle avatar-lg">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary font--size18 mb-1">Stanley M. Dyke</h5>
                            <p class="font-size-12 mb-2">Creative Director</p>
                            <p class="mb-0">Stanley@veltrix.com</p>
                        </div>
                        <ul class="list-unstyled social-links ms-auto">
                            <li><a href="#" class="btn-primary"><i class="mdi mdi-facebook"></i></a></li>
                            <li><a href="#" class="btn-info"><i class="mdi mdi-twitter"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                    <p class="mb-0"><b>Intro : </b>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis atque corrupti quos dolores et... <a href="#" class="text-primary"> Read More</a></p>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->

    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
