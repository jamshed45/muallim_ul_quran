@extends('layouts.master')
@section('title') Locations @endsection
@section('css')

@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Edit Location @endslot
    @slot('subtitle') <a href="{{ route('locations.index') }}">Locations</a> @endslot
    @endcomponent


    <form action="{{ route('locations.update', $location) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Clients</h4>
                        <p class="card-title-desc"></p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="Name">Select Client <span class="text-danger">*</span></label><br>

                                @foreach($clients as $client)
                                {{ $location->client_id == $client->id ? $client->name : '' }}
                                @endforeach

                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="email">Name</label><br>
                            {{ $location->location_name }}
                        </div>


                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="email">Address <span class="text-danger">*</span></label><br>
                            {{ $location->location_address }}
                        </div>


                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Core-D.Flo Connectivity</h4>


                        <div class="row bg-light-blue mt-4 mb-5 pt-4">

                            <div class="mb-3 col-md-5" bis_skin_checked="1">
                                <label class="form-label" for="Name">Core Location ID</label><br>
                                {{ $location->core_location_id }}
                            </div>

                            <div class="mb-3 col-md-5" bis_skin_checked="1">
                                <label  class="form-label" for="email">D.Flo Location ID <span class="text-danger">*</span></label><br>
                                {{ $location->ghl_location_id }}
                            </div>

                            <div class="col-md-2"></div>

                        </div>



                        <div class="repeater" enctype="multipart/form-data">
                            <div data-repeater-list="calender_ids">

                                @foreach ($userCalendar as $calendar)

                                <div class="row bg-light-gray mb-2" data-repeater-item>
                                    <div class="mb-3 col-lg-5">
                                        <label class="form-label" for="name">Core Calender ID</label><br>
                                        {{ $calendar->core_calender_id }}

                                    </div>
                                    <!-- end col -->
                                    <div class="mb-3 col-lg-5">
                                        <label class="form-label" for="email">D.Flo Calender ID </label><br>
                                        {{ $calendar->ghl_calender_id }}
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-2 col-sm-4 align-self-center pt-4">

                                    </div>
                                    <!-- end col -->
                                </div>

                                @endforeach

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                            <div class="mb-3" bis_skin_checked="1">
                                <label  class="form-label" for="location_status">Status</label>

                                {{ $location->status == 1 ? 'Active' : 'Inactive' }}
                            </div>




                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        </form>



    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/pages/form-repeater.int.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
