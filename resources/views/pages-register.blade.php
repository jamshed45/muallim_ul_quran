@extends('layouts.master-without-nav')
@section('title') Register @endsection
@section('body') <body> @endsection
    @section('content')

    <div class="home-btn d-none d-sm-block">
        <a href="index" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Free Register</h5>
                                <p class="text-white-50">Get your free Veltrix account now.</p>
                                <a href="index" class="logo logo-admin">
                                    <img src="{{URL::asset('assets/images/logo-sm.png')}}" height="24" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class=" mt-4" action="index">

                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                        </div>
                                    </div>

                                    <div class="mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <p class="mb-0">By registering you agree to the Veltrix <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Already have an account ? <a href="pages-login" class="fw-medium text-primary"> Login </a> </p>
                        <p>© <script>
                                document.write(new Date().getFullYear())

                            </script> {{ get_site_name() }}.</p>
                    </div>


                </div>
            </div>
        </div>
    </div>


    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
