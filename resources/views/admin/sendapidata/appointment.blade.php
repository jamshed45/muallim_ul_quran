@extends('layouts.master')
@section('title') Core Appointments @endsection
@section('css')
<!-- DataTables -->
<link href="{{URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Core Appointments @endslot
    @slot('subtitle') Appointments @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-9"><h4 class="card-title">Patients</h4></div>

                        @include('filters.filter-client')

                    </div>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>StartTime</th>
                                <th>EndTime</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($output))
                            @foreach($output as $key => $appoint)
                            <tr>
                            <?php
                            $data = json_decode($appoint->Patient);

                              $AppointmentType = $appoint->AppointmentType;
                              $Attendance = $appoint->Attendance;
                               if($AppointmentType == 0 || $AppointmentType == 1){
                              $appointmentStatus = 'Confirmed';
                              }
                              else if($Attendance == 3 || $Attendance == 4 ){
                              $appointmentStatus = 'No Show';
                              }else if($Attendance == 5 || $AppointmentType == 2){
                              $appointmentStatus = 'Cancelled';
                              }

                             ?>

                                <td>
                                    {{ $data->Firstname }} {{ $data->Lastname }}
                                </td>
                                <td>
                                    {{ $data->Email }}
                                </td>
                                <td>
                                    {{ $appointmentStatus }}
                                </td>

                                <td>
                                 {{ date('Y-m-d H:i:s', strtotime($appoint->startTime)) }}
                                </td>
                                <td>
                                {{ date('Y-m-d H:i:s', strtotime($appoint->endTime)) }}
                                </td>


                            </tr>
                            @endforeach
                            @else
                            <td> Note : Appointments Is Empty ?.</td>
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

<script>
    document.getElementById('clientSelect').addEventListener('change', function() {
        var clientId = this.value;
        if (clientId) {
            var url = new URL(window.location.href);
            url.searchParams.set('client_id', clientId);
            window.location.href = url.toString();
        }
    });

    document.getElementById('resetButton').addEventListener('click', function() {
        var url = new URL(window.location.href);
        url.search = '';
        window.location.href = url.toString();
    });
</script>
<script src="{{URL::asset('assets/js/client_filter.js')}}"></script>
    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
