@extends('layouts.master')
@section('title') Compact Sidebar @endsection
@section('css')
<link href="{{URL::asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">
@endsection
@section('body') <body data-sidebar="dark" data-sidebar-size="small"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Compact Sidebar @endslot
    @slot('subtitle') Vertical Layouts @endslot
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
