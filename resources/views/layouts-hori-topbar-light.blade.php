@extends('layouts.horizontal-layout')
@section('title') Topbar Light @endsection
@section('css')
<link href="{{URL::asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">
@endsection
@section('body') <body data-topbar="light" data-layout="horizontal"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Topbar Light @endslot
    @slot('subtitle') Icons @endslot
    @endcomponent


  

    @endsection
    @section('scripts')

    <!-- Peity chart-->
    <script src="{{URL::asset('assets/libs/peity/peity.min.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{URL::asset('assets/libs/chartist/chartist.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltips.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/pages/dashboard.init.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
