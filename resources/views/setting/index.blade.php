@extends('layouts.master')
@section('title') Settings @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Settings @endslot
    @slot('subtitle') All Settings @endslot
    @endcomponent


    <div class="row" bis_skin_checked="1">

    @if(auth()->check() && (
        auth()->user()->hasRole('Super Admin') ||
        auth()->user()->can('Admin Site Setting Edit') ||
        auth()->user()->can('Admin Site Setting View')
    ))
        <div class="col-xl-6 col-md-6" bis_skin_checked="1">
            <a href="{{ route('view.sitesetting') }}">
            <div class="card pricing-box" bis_skin_checked="1">
                <div class="card-body p-4" bis_skin_checked="1">
                    <div class="d-flex mt-0" bis_skin_checked="1">
                        <div class="flex-shrink-0 align-self-center" bis_skin_checked="1">
                            <i class="ion ion ion-md-construct h2"></i>
                        </div>
                        <div class="flex-grow-1 ms-auto card-content-pl" bis_skin_checked="1">
                            <h4>General Settings</h4>
                            <p class="text-muted mb-0">General settings such as the site name, admin email etc.</p>
                        </div>
                    </div>


                </div>
            </div>
            </a>
        </div>
        <!-- end col -->
    @endif

    @if(auth()->check() && (
        auth()->user()->hasRole('Super Admin') ||
        auth()->user()->can('Admin Core Practice Setting Edit') ||
        auth()->user()->can('Admin Core Practice Setting View')
    ))
        <div class="col-xl-6 col-md-6" bis_skin_checked="1">
            <a href="{{ route('view.corepracticesetting') }}">
            <div class="card pricing-box" bis_skin_checked="1">
                <div class="card-body p-4" bis_skin_checked="1">
                    <div class="d-flex mt-0" bis_skin_checked="1">
                        <div class="flex-shrink-0 align-self-center" bis_skin_checked="1">
                            <i class="ion ion-md-grid h2"></i>
                        </div>
                        <div class="flex-grow-1 ms-auto card-content-pl" bis_skin_checked="1">
                            <h4>Core Practice Settings</h4>
                            <p class="text-muted mb-0">Setup Core practice settings such as live or sandbox mode with api threshold
                            </p>
                        </div>
                    </div>


                </div>
            </div>
            </a>
        </div>
        <!-- end col -->
    @endif

    @if(auth()->check() && (
        auth()->user()->hasRole('Super Admin') ||
        auth()->user()->can('Admin D Flo Setting Edit') ||
        auth()->user()->can('Admin D Flo Setting View')
    ))
        <div class="col-xl-6 col-md-6" bis_skin_checked="1">
            <a href="{{ route('view.dflosetting') }}">
            <div class="card pricing-box" bis_skin_checked="1">
                <div class="card-body p-4" bis_skin_checked="1">
                    <div class="d-flex mt-0" bis_skin_checked="1">
                        <div class="flex-shrink-0 align-self-center" bis_skin_checked="1">
                            <i class="on ion-md-apps h2"></i>
                        </div>
                        <div class="flex-grow-1 ms-auto card-content-pl" bis_skin_checked="1">
                            <h4>DFlo Settings</h4>
                            <p class="text-muted mb-0">Setup DFlo settings such as live or sandbox mode with api threshold</p>
                        </div>
                    </div>


                </div>
            </div>
            </a>
        </div>
        <!-- end col -->
    @endif



    </div>





      @endsection



      @section('scripts')



    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
