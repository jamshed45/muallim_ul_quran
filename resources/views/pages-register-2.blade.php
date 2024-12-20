@extends('layouts.master-without-nav')
@section('title') Register 2 @endsection
@section('body') <body class="account-pages"> @endsection
    @section('content')

    <!-- Begin page -->
    <div class="accountbg" style="background: url('assets/images/bg.jpg');background-size: cover;background-position: center;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card shadow-none">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box shadow-none p-4">
                        <div class="p-2">
                            <div class="text-center mt-4">
                                <a href="index.html"><img src="{{URL::asset('assets/images/logo-dark.png')}}" height="22" alt="logo"></a>
                            </div>

                            <h4 class="font-size-18 mt-5 text-center">Free Register</h4>
                            <p class="text-muted text-center">Get your free Veltrix account now.</p>

                            <form class="mt-4" action="#">

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
                                    <div class="col-12 mt-3">
                                        <p class="mb-0">By registering you agree to the Veltrix <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Already have an account ? <a href="pages-login-2.html" class="fw-medium text-primary"> Login </a> </p>
                                <p>© <script>
                                        document.write(new Date().getFullYear())

                                    </script> {{ get_site_name() }}.</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
