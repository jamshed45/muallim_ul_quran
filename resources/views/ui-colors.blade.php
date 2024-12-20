@extends('layouts.master')
@section('title') Colors @endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Colors @endslot
    @slot('subtitle') UI Elements @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="color-box p-4 rounded bg-primary">
                        <h5 class="my-2 text-white">#2D6192</h5>
                    </div>
                    <h5 class="mb-0 mt-4 text-primary text-center font-size-18">Primary</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="color-box p-4 rounded bg-success">
                        <h5 class="my-2 text-white">#31A1B1</h5>
                    </div>
                    <h5 class="mb-0 mt-4 text-success text-center font-size-18">Success</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="color-box p-4 rounded bg-info">
                        <h5 class="my-2 text-white">#38a4f8</h5>
                    </div>
                    <h5 class="mb-0 mt-4 text-info text-center font-size-18">Info</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="color-box p-4 rounded bg-warning">
                        <h5 class="my-2 text-white">#f8b425</h5>
                    </div>
                    <h5 class="mb-0 mt-4 text-warning text-center font-size-18">Warning</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="color-box p-4 rounded bg-danger">
                        <h5 class="my-2 text-white">#ec4561</h5>
                    </div>
                    <h5 class="mb-0 mt-4 text-danger text-center font-size-18">Danger</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="color-box p-4 rounded bg-dark">
                        <h5 class="my-2 text-light">#343a40</h5>
                    </div>
                    <h5 class="mb-0 mt-4 text-dark text-center font-size-18">Dark</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="color-box p-4 rounded bg-secondary">
                        <h5 class="my-2 text-muted">#e9ecef</h5>
                    </div>
                    <h5 class="mb-0 mt-4 text-muted text-center font-size-18">Secondary</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
