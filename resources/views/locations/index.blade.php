@extends('layouts.master')
@section('title') Locations @endsection
@section('css')
<!-- DataTables -->
<link href="{{URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') All Locations @endslot
    @slot('subtitle') Locations @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-9"><h4 class="card-title">Locations</h4></div>

                        @include('filters.filter-client')

                    </div>


                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Core Location ID</th>
                                <th>D.Flo Location ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($locations as $location)
                            <tr>
                                <td>{{ $location->core_location_id }}</td>
                                <td>{{ $location->ghl_location_id }}</td>
                                <td>{{ $location->location_name }}</td>
                                <td>{{ $location->location_address }}</td>
                                <td>
                                    <input class="form-check form-switch status-toggle" type="checkbox" name="location_status_<?=$location->id;?>" id="location_status_<?=$location->id;?>" switch="info" value="1" data-id="{{ $location->id }}" {{ $location->status ? 'checked' : '' }}>
                                    <label class="form-label" for="location_status_<?=$location->id;?>" data-on-label="Yes" data-off-label="No"></label><br>
                                    <small class="message" id="message-{{ $location->id }}"></small>
                                </td>
                                <td>
                                    @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Locations Management Edit')))

                                    @php
                                        $clientId = request()->query('client_id');
                                    @endphp
                                    @if($clientId)
                                        <a href="{{ route('locations.edit', $location) }}?client_id={{ $clientId }}" class="text-success mx-2">
                                            <i class="fas fa-marker" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('locations.edit', $location) }}" class="text-success mx-2">
                                            <i class="fas fa-marker" aria-hidden="true"></i>
                                        </a>
                                    @endif

                                   @endif


                                   @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Locations Management Delete')))
                                    <a href="#" onclick="confirmDelete('{{ route('locations.destroy', $location) }}')" class="text-danger mx-2">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    @endif

                                    @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Locations Management View')))
                                    <a href="{{ route('locations.show', $location) }}" class="text-success mx-2">
                                        <i class="fas fa-eye" aria-hidden="true"></i>
                                    </a>
                                    @endif


                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <script>
                        function confirmDelete(action) {
                            $('#deleteForm').attr('action', action);
                            $('#deleteConfirmationModal').modal('show');
                        }
                    </script>


                    <div class="modal fade" id="deleteConfirmationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Location
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this location?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="deleteForm" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->



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
    $(document).ready(function() {
        $('.status-toggle').change(function() {

            var updateStatusUrl = '{{ route("locations.updateStatus", ":id") }}';

            var locationId = $(this).data('id');
            var status = $(this).is(':checked') ? 1 : 0;
            var messageElement = $('#message-' + locationId);
            messageElement.html('');

            var url = updateStatusUrl.replace(':id', locationId);

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(response) {
                    messageElement.html('<span class="text-success">Status updated successfully!</span>');
                },
                error: function(xhr) {
                    messageElement.html('<span class="text-danger">An error occurred while updating the status.</span>');
                }
            });
        });
    });
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
