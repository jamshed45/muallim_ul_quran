@extends('layouts.master')
@section('title') All Skip Appointments Core-Practice @endsection
@section('css')
<!-- DataTables -->
<link href="{{URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') All Skip Appointments Core-Practice @endslot
    @slot('subtitle') Appointments @endslot
    @endcomponent



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-9"><h4 class="card-title">All Skip Appointments Core-Practice</h4></div>

                        @include('filters.filter-client')

                    </div>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                 <th>Email</th>
                                 <th>Location Name</th>
                                <th>Appointment Time</th>
                                <th>Appointment EndTime</th>
                                <th>Merge Appointment</th>
                                <!-- <th class="text-center" colspan="">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($skipappointmentcore))

                            @foreach($skipappointmentcore as $val)
                          <tr>

                               @php

                               $datacon = json_decode($val->Patient);
                                @endphp
                                <td>

                                    {{ $datacon->Firstname}}
                                     {{ $datacon->Lastname}}
                                </td>

                                   <td>

                                    {{ $val->email}}
                                </td>


                                       <td>
                                    {{ $val->skipstatusname }}
                                </td>
                                <td>
                                    {{ date('Y-m-d h:i:s', strtotime($val->startTime)) }}
                                </td>
                                <td>
                                    {{ date('Y-m-d h:i:s', strtotime($val->endTime)) }}
                                </td>
                                <td>
                                    @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Skip Appointments Core Merge Data')))
                                        <a href="" class="btn btn-primary btn-sm">MergeData</a>
                                    @endif
                                </td>
                            </tr>

                          @endforeach

                            @else
                            <td> Note : Appointment Is Empty ?.</td>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')

    <!-- Required datatable js -->
    <script src="{{URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    {{-- <script src="{{URL::asset('assets/js/pages/datatables.init.js')}}"></script> --}}

    <script>

        $(document).ready(function() {

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                "pageLength": {{ get_records_per_page() }} ,
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

                $(".dataTables_length select").addClass('form-select form-select-sm');
        } );

    </script>


    <script src="{{URL::asset('assets/js/client_filter.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
