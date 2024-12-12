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

        @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('D-Flo Patient')))
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary mini-stat-leadflo-bg text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{URL::asset('assets/images/services-icon/dental-patient.png')}}" alt="">
                        </div>
                        <h5 class="font-size-15 text-uppercase text-white-50">Patient D-Flo</h5>
                        <h4 class="fw-medium font-size-16">{{$totalGhlPatient}} Patient</h4>

                    </div>

                </div>
            </div>
        </div>
        @endif

        @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Core Patient')))
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary mini-stat-leadflo-bg text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{URL::asset('assets/images/services-icon/dental-patient.png')}}" alt="">
                        </div>
                        <h5 class="font-size-15 text-uppercase text-white-50">Patient Core-Practice</h5>
                        <h4 class="fw-medium font-size-16">{{$totalPatientCore}} Patient</h4>

                    </div>

                </div>
            </div>
        </div>
        @endif

        @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Core Appt')))
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary mini-stat-leadflo-bg text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{URL::asset('assets/images/services-icon/app.png')}}" alt="">
                        </div>
                        <h5 class="font-size-15 text-uppercase text-white-50">Appointment Core-Practice</h5>
                        <h4 class="fw-medium font-size-16">{{$totalCoreAppoint}} Appointments</h4>

                    </div>

                </div>
            </div>
        </div>
        @endif

        @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('D-Flo Appt')))
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary mini-stat-leadflo-bg text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{URL::asset('assets/images/services-icon/app.png')}}" alt="">
                        </div>
                        <h5 class="font-size-15 text-uppercase text-white-50">Appointment D-Flo</h5>
                        <h4 class="fw-medium font-size-16">{{$totalGhlAppoint}} Appointments</h4>

                    </div>

                </div>
            </div>
        </div>
        @endif



    </div>
    <!-- end row -->


        <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Total Patients</h4>


                    <canvas id="total_patients" height="200"></canvas>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Total Appointments</h4>


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

    <script>
        const total_appointments = document.getElementById('total_appointments').getContext('2d');
        const mytotal_appointments = new Chart(total_appointments, {
        type: 'bar', // Specify the chart type
        data: {
            datasets: [{
            label: 'Total Appointments', // Dataset label
            data: [{{$totalAppoint }}], // Single data value
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Background color of bars
            borderColor: 'rgba(54, 162, 235, 1)', // Border color of bars
            borderWidth: 1 // Border width of bars
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true, // Ensure the y-axis starts at zero
                ticks: {
                callback: function(value) {
                    return Number(value).toFixed(0); // Remove decimal point
                }
                }
            }
            }
        }
        });

        const total_patients = document.getElementById('total_patients').getContext('2d');
        const mytotal_total_patients = new Chart(total_patients, {
        type: 'bar', // Specify the chart type
        data: {
            datasets: [{
            label: 'Total Patients', // Dataset label
            data: [{{ $totalpatient }}], // Single data value
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Background color of bars
            borderColor: 'rgba(54, 162, 235, 1)', // Border color of bars
            borderWidth: 1 // Border width of bars
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true, // Ensure the y-axis starts at zero
                ticks: {
                callback: function(value) {
                    return Number(value).toFixed(0); // Remove decimal point
                }
                }
            }
            }
        }
        });


    </script>


    {{-- <script src="{{URL::asset('assets/js/pages/dashboard.init.js')}}"></script> --}}

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
