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

    @php
    $get_client_id = request()->query('client_id');
    if($get_client_id)
    {
        $client_id = $get_client_id;
    }
    else {
        $client_id = '';
    }
    @endphp

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
                            <label class="form-label" for="Name">Select Client <span class="text-danger">*</span></label>
                            <select class="form-control" name="client_id" id="clientSelect" required>
                                <option value="" disabled selected>Select a client</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ $location->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="redirect_client_id" value="{{ $client_id }}" />
                        </div>

                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="email">Name <span class="text-danger">*</span></label>
                            <input type="text" name="location_name" id="location_name" class="form-control" value="{{ $location->location_name }}" required>
                        </div>


                        <div class="mb-3" bis_skin_checked="1">
                            <label  class="form-label" for="email">Address <span class="text-danger">*</span></label>
                            <textarea type="text" name="location_address" id="location_address" class="form-control" value="{{ $location->location_address }}" required>{{ $location->location_address }}</textarea>
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
                                <label class="form-label" for="Name">Core Location ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="core_location_id" id="core_location_id" value="{{ $location->core_location_id }}" required>
                            </div>

                            <div class="mb-3 col-md-5" bis_skin_checked="1">
                                <label  class="form-label" for="email">D.Flo Location ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="ghl_location_id" id="ghl_location_id"  value="{{ $location->ghl_location_id }}" required>
                            </div>

                            <div class="col-md-2"></div>

                        </div>



                        <div class="repeater" enctype="multipart/form-data">
                            <div data-repeater-list="calender_ids">

                                @foreach ($userCalendar as $calendar)

                                <div class="row bg-light-gray mb-2" data-repeater-item>
                                    <div class="mb-3 col-lg-5">
                                        <label class="form-label" for="name">Core Calender ID <span class="text-danger">*</span></label>
                                        <input type="text" name="core_calender_id" class="form-control" value="{{ $calendar->core_calender_id }}" required/>
                                        <input type="hidden" name="calender_id" value="{{ $calendar->id }}" />
                                    </div>
                                    <!-- end col -->
                                    <div class="mb-3 col-lg-5">
                                        <label class="form-label" for="email">D.Flo Calender ID <span class="text-danger">*</span></label>
                                        <input type="text" name="ghl_calender_id" class="form-control" value="{{ $calendar->ghl_calender_id }}"  required/>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-2 col-sm-4 align-self-center pt-4">
                                        <div class="d-grid">
                                            <input data-repeater-delete type="button" class="btn btn-primary mb-2" value="Delete" />
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>

                                @endforeach

                            </div>
                            <input data-repeater-create type="button" class="btn btn-success mt-2 mt-sm-0" value="Add" />
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

                                <select class="form-control" name="status" id="location_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1" {{ $location->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $location->status == 0 ? 'selected' : '' }}>InActive</option>
                                </select>
                            </div>

                            <div class="col-12" bis_skin_checked="1">
                                <button class="btn btn-primary" type="submit">Update Location</button>
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
