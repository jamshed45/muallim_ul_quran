@extends('layouts.master')
@section('title') Dashboard @endsection
@section('css')
<link href="{{URL::asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">
@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')

    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Dashboard</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to {{ get_site_name() }} Dashboard </li>
                </ol>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
    <!-- end page title -->

    <style>
        .mini-stat {
          display: flex;
          flex-direction: column;
          height: 100%;
        }
        .card-body {
          flex: 1;
        }
    </style>

    <div class="row d-flex align-items-stretch mb-4">







    </div>
    <!-- end row -->


        <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4"></h4>


                    <canvas id="total_patients" height="200"></canvas>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4"></h4>


                    <canvas id="total_appointments" height="200"></canvas>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->






    @endsection
    @section('scripts')
    <script src="{{URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <!-- Peity chart-->
    <script src="{{URL::asset('assets/libs/peity/peity.min.js')}}"></script>

    <!-- Plugin Js-->



    <script src="{{URL::asset('assets/libs/chart-js/chart-js.min.js')}}"></script>




    {{-- <script src="{{URL::asset('assets/js/pages/dashboard.init.js')}}"></script> --}}

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
