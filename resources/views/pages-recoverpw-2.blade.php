@extends('layouts.master-without-nav')
@section('title') Recoverpw 2 @endsection
@section('css')
<link href="{{URL::asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">
@endsection
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

                            <h4 class="font-size-18 mt-5 text-center">Reset Password</h4>

                            <form class="mt-4" action="#">

                                <div class="alert alert-success mt-4" role="alert">
                                    Enter your Email and instructions will be sent to you!
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="useremail">Email</label>
                                    <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                </div>

                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                    </div>
                                </div>

                                <div class="mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                        <a href="pages-recoverpw-2"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">

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
