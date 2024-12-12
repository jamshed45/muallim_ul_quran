@extends('layouts.master')
@section('title') Permission @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Permission @endslot
    @slot('subtitle') Tables @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Permission</h4>
                    <p class="card-title-desc"></p>

                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="Name">Name</label>
                            <div bis_skin_checked="1">
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                        </div>

                        <div class="col-12" bis_skin_checked="1">
                            <button class="btn btn-primary" type="submit">Add Permission</button>
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')



    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
