<!-- start page title -->
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">{{$page_title}}</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                <li class="breadcrumb-item">{{$subtitle}}</li>
                <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
            </ol>
        </div>
        <div class="col-md-4" bis_skin_checked="1">
            <div class="float-end d-none d-md-block" bis_skin_checked="1">
                @if (Request::is('users*'))
                    @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Users Management Add')))
                        <a href="{{ route('users.create') }}" class="btn btn-success">Create User</a>
                    @endif
                @endif
                @if (Request::is('roles*'))
                    @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Roles Management Add')))
                        <a href="{{ route('roles.create') }}" class="btn btn-success">Create Role</a>
                    @endif
                @endif
                @if (Request::is('*client*'))
                    @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Clients Management Add')))
                        <a href="{{ route('clients.create') }}" class="btn btn-success">Create Client</a>
                    @endif
                @endif
                @if (Request::is('*location*'))
                    @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Location Management Add')))
                    @php
                        $clientId = request()->query('client_id');
                    @endphp
                        @if($clientId)
                            <a href="{{ route('locations.create') }}?client_id={{ $clientId }}" class="btn btn-success">Create Location</a>
                        @else
                            <a href="{{ route('locations.create') }}" class="btn btn-success">Create Location</a>
                        @endif
                    @endif
                 @endif


            </div>
        </div>

    </div>
</div>
<!-- end page title -->


