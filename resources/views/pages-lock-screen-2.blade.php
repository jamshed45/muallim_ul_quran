@extends('layouts.master-without-nav')
@section('title') Lock Screen 2 @endsection
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
                                <a href="index"><img src="{{URL::asset('assets/images/logo-dark.png')}}" height="22" alt="logo"></a>
                            </div>

                            <h4 class="font-size-18 mt-5 text-center">Locked</h4>
                            <p class="text-muted text-center">Hello Smith, enter your password to unlock the screen!</p>

                            <form class="mt-4" action="#">

                                <div class="pt-3 text-center">
                                    <img src="{{URL::asset('assets/images/users/user-6.jpg')}}" class="rounded-circle img-thumbnail avatar-lg" alt="thumbnail">
                                    <h6 class="font-size-16 mt-3">Robert Smith</h6>
                                </div>

                                <div class="mb-3">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                </div>

                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Unlock</button>
                                    </div>
                                </div>


                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Not you ? return <a href="pages-login-2" class="fw-medium text-primary"> Sign In </a> </p>
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
