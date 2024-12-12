
@extends('layouts.master-without-nav')
@section('title') Login @endsection
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
                                <h5 class="text-white font-size-20">Verification !</h5>
                                <p class="text-white-50">verify code from email continue to {{ get_site_name() }}.</p>
                                <div class="logo logo-admin">
                                    <img src="{{URL::asset('assets/images/logo-sm.png')}}" height="35" alt="logo">
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="p-3">
                                <form action="{{ route('verify') }}" method="POST" class="mt-4">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="verification_code">Verification Code</label>
                                        <input type="text" name="verification_code" class="form-control" required>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-6 text-start">
                                            <button type="submit" class="btn btn-primary w-md waves-effect waves-light">
                                                {{ __('Verify') }}
                                            </button>
                                        </div>
                                    </div>


                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">

                        <p class="mb-0">© <script>
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
