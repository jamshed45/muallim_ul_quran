@extends('layouts.master')
@section('title') Sparkline Chart @endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Sparkline Chart @endslot
    @slot('subtitle') Sparkline Chart @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pie Chart</h4>
                    <div id="sparkline1" class="text-center"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bar Chart</h4>
                    <div id="sparkline2" class="text-center"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body analytics-info">
                    <h4 class="card-title">Line Chart</h4>
                    <div id="sparkline4"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Composite Bar Chart</h4>
                    <div id="sparkline3" class="text-center"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Line Chart</h4>
                    <div id="sparkline5" class="text-center"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <div class="card bg-success mb-4">
                <div class="card-body">
                    <h4 class="card-title text-white">Discrete Chart</h4>
                    <div id="sparkline6" class="text-center"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bullet Chart</h4>
                    <div id="sparkline7"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Box Plot Chart</h4>
                    <div id="sparkline8" class="text-center"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tristate Chart</h4>
                    <div id="sparkline9" class="text-center"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/libs/jquery-sparkline/jquery-sparkline.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/pages/sparklines.init.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
