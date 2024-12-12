@extends('layouts.master')
@section('title') D.Flo To Corepractice Patients @endsection
@section('css')
<!-- DataTables -->
<link href="{{URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') D.Flo To Corepractice Patients @endslot
    @slot('subtitle') Patients @endslot
    @endcomponent



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-9"><h4 class="card-title">D.Flo To Corepractice Patients</h4></div>

                        @include('filters.filter-client')

                    </div>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Contact Id</th>
                                <th>LocationId Id</th>
                                <th> Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($GetPatient))
                            @foreach($GetPatient as $key => $val)
                            <tr>
                                <td>
                                    {{ $val->contactId }}
                                </td>
                                <td>
                                    {{ $val->locationId }}
                                </td>
                                <td>
                                    {{ $val->firstName }}
                                    {{ $val->lastName }}
                                </td>

                                <td>
                                    {{ $val->email }}
                                </td>
                                <td>
                                    {{ $val->phone }}
                                </td>

                                <!--<td>-->
                                <!--    {{ date('d-m-Y', strtotime($val->created_at)) }}-->
                                <!--</td>-->

                            </tr>
                            @endforeach
                            @else
                            <td> Note : Patient Is Empty ?.</td>
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
                // Update the URL with the selected client ID and reload the page
                var url = new URL(window.location.href);
                url.searchParams.set('client_id', clientId);
                window.location.href = url.toString();
            }
        });
    </script>

    <script src="{{URL::asset('assets/js/client_filter.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
