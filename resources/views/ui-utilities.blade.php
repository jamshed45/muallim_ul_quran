@extends('layouts.master')
@section('title') Utilities @endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Utilities @endslot
    @slot('subtitle') UI Elements @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Additive Border</h4>
                    <p class="card-title-desc">Add borders to custom elements.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="border border-primary bg-light p-5 d-inline-block"></span>
                        <span class="border-top border-primary bg-light p-5 d-inline-block"></span>
                        <span class="border-end border-primary bg-light p-5 d-inline-block"></span>
                        <span class="border-bottom border-primary bg-light p-5 d-inline-block"></span>
                        <span class="border-start border-primary bg-light p-5 d-inline-block"></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Subtractive Border</h4>
                    <p class="card-title-desc">Or remove borders to custom elements.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="border border-0 border-primary bg-light p-5 d-inline-block"></span>
                        <span class="border border-top-0 border-primary bg-light p-5 d-inline-block"></span>
                        <span class="border border-end-0 border-primary bg-light p-5 d-inline-block"></span>
                        <span class="border border-bottom-0 border-primary bg-light p-5 d-inline-block"></span>
                        <span class="border border-start-0 border-primary bg-light p-5 d-inline-block"></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Border Color</h4>
                    <p class="card-title-desc">Change the border color using utilities built on our theme colors.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="border border-primary bg-light p-5 d-inline-block"></span>
                        <span class="border border-secondary bg-light p-5 d-inline-block"></span>
                        <span class="border border-success bg-light p-5 d-inline-block"></span>
                        <span class="border border-danger bg-light p-5 d-inline-block"></span>
                        <span class="border border-warning bg-light p-5 d-inline-block"></span>
                        <span class="border border-info bg-light p-5 d-inline-block"></span>
                        <span class="border border-dark bg-light p-5 d-inline-block"></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Border Width</h4>
                    <p class="card-title-desc">Change the border color using utilities built on our theme colors.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="border border-1 p-5 d-inline-block"></span>
                        <span class="border border-2 p-5 d-inline-block"></span>
                        <span class="border border-3 p-5 d-inline-block"></span>
                        <span class="border border-4 p-5 d-inline-block"></span>
                        <span class="border border-5 p-5 d-inline-block"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Border Opacity</h4>
                    <p class="card-title-desc">To change that opacity, override <code>--bs-border-opacity</code> via custom styles or inline styles.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="border border-primary border-opacity-10 bg-light p-5 d-inline-block"></span>
                        <span class="border border-primary border-opacity-25 bg-light p-5 d-inline-block"></span>
                        <span class="border border-primary border-opacity-50 bg-light p-5 d-inline-block"></span>
                        <span class="border border-primary border-opacity-75 bg-light p-5 d-inline-block"></span>
                        <span class="border border-primary border-opacity-100 bg-light p-5 d-inline-block"></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Border Radius</h4>
                    <p class="card-title-desc">Add classes to an element to easily round its corners.
                    </p>
                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" class="rounded avatar-xl" alt=" ">
                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" class="rounded-top avatar-xl" alt="">
                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" class="rounded-end avatar-xl" alt="">
                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" class="rounded-bottom avatar-xl" alt="">
                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" class="rounded-start avatar-xl" alt="">
                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" class="rounded-circle avatar-xl" alt="">
                        <img src="{{URL::asset('assets/images/small/img-3.jpg')}}" alt="" class="rounded-pill w-25 h-auto">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Rounded Sizes</h4>
                    <p class="card-title-desc">Use the scaling classes for larger or smaller rounded corners. Sizes range from <code> 0</code> to <code> 3</code>, and can be configured<code> 4</code> & <code> 5</code> by modifying the utilities API.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <img src="{{URL::asset('assets/images/small/img-3.jpg')}}" class="rounded-0 avatar-xl" alt="">
                        <img src="{{URL::asset('assets/images/small/img-3.jpg')}}" class="rounded-1 avatar-xl" alt="">
                        <img src="{{URL::asset('assets/images/small/img-3.jpg')}}" class="rounded-2 avatar-xl" alt="">
                        <img src="{{URL::asset('assets/images/small/img-3.jpg')}}" class="rounded-3 avatar-xl" alt="">
                        <img src="{{URL::asset('assets/images/small/img-3.jpg')}}" class="rounded-4 avatar-xl" alt="">
                        <img src="{{URL::asset('assets/images/small/img-3.jpg')}}" class="rounded-5 avatar-xl" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end-row -->

    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
