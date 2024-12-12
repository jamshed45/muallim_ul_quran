<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('index') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Users Management') || auth()->user()->can('Roles Management')))
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>User Mangement</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="true">

                        @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Users Management')))
                        <li>
                            <a href="{{ route('users.index') }}">Users</a>
                        </li>
                        @endif

                        @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Roles Management')))
                        <li>
                            <a href="{{ route('roles.index') }}" >Roles</a>
                        </li>
                        @endif
                        {{-- <li>
                            <a href="{{ route('permissions.index') }}" >Permissions</a>
                        </li> --}}
                    </ul>
                </li>
                @endif

                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Clients Management')))
                <li>
                    <a href="{{ route('clients.index') }}" class="waves-effect">
                        <i class="ti-support"></i>
                        <span>Clients</span>
                    </a>
                </li>
                @endif

                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Locations Management')))
                <li>
                    <a href="{{ route('locations.index') }}" class="waves-effect">
                        <i class="ti-support"></i>
                        <span>Locations</span>
                    </a>
                </li>
                @endif

                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Locations Management')))
                {{-- <li>
                    <a class="long-link-cl" href="{{ route('locations.index') }}" class="waves-effect">
                        <i class="ti-support"></i>
                        <span>Locations</span>
                    </a>
                </li> --}}
                @endif

                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Core Patient')))
                <li>
                    <a href="{{ route('view.patient') }}" class="waves-effect">
                        <i class="ti-support"></i>
                        <span>Core Patients</span>
                    </a>
                </li>
                @endif
                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Core Appt')))
                <li>
                    <a href="{{ route('view.appointment') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Core Appt.</span>
                    </a>
                </li>
                @endif
                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('D-Flo Patient')))
                <li>
                    <a href="{{ route('view.patientdata') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>D.Flo Patients</span>
                    </a>
                </li>
                @endif
                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('D-Flo Appt')))
                <li>
                    <a href="{{ route('view.Ghlappointment') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>D.Flo Appt.</span>
                    </a>
                </li>
                @endif
                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Skip Appointments D-Flo')))
                <li>
                    <a href="{{ route('skip.Ghlappointment') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Skip Appt. D.Flo</span>
                    </a>
                </li>
                @endif
                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Skip Appointments Core')))
                <li>
                    <a  href="{{ route('skip.Coreappointment') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Skip Appt. Core</span>
                    </a>
                </li>
                @endif
                @if(auth()->check() && (
                auth()->user()->hasRole('Super Admin') ||
                auth()->user()->can('Admin Site Setting Edit') ||
                auth()->user()->can('Admin Site Setting View') ||
                auth()->user()->can('Admin Core Practice Setting Edit') ||
                auth()->user()->can('Admin Core Practice Setting View') ||
                auth()->user()->can('Admin D Flo Setting Edit') ||
                auth()->user()->can('Admin D Flo Setting View') ||
                auth()->user()->hasRole('Client')
                ))
                <li>
                    <a  href="{{ route('settings.index') }}" class="waves-effect">
                        <i class="ti-settings"></i>
                        <span>Settings</span>
                    </a>
                </li>
                @endif

                {{-- @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Core Appt')))
                <li>
                    <a  class="long-link-cl" href="{{ route('skip.Coreappointment') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Core-Practice Setting</span>
                    </a>
                </li>
                @endif
                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Core Appt')))
                <li>
                    <a  class="long-link-cl" href="{{ route('view.sitesetting') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Site Settings</span>
                    </a>
                </li>
                @endif
                @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->can('Core Appt')))
                <li>
                    <a  class="long-link-cl" href="{{ route('view.dflosetting') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>D-Flo Setting</span>
                    </a>
                </li>
                @endif --}}





                {{-- <li class="menu-title">Extras</li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="ti-layout"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="#" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-light-sidebar">Light Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar">Compact Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar">Icon Sidebar</a></li>
                                <li><a href="layouts-boxed">Boxed Layout</a></li>
                                <li><a href="layouts-colored-sidebar">Colored Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal">Horizontal</a></li>
                                <li><a href="layouts-hori-topbar-light">Light Topbar</a></li>
                                <li><a href="layouts-hori-boxed">Boxed Layout</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}



                {{-- <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="ti-archive"></i>
                        <span> Authentication </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-login">Login 1</a></li>
                        <li><a href="pages-login-2">Login 2</a></li>
                        <li><a href="pages-register">Register 1</a></li>
                        <li><a href="pages-register-2">Register 2</a></li>
                        <li><a href="pages-recoverpw">Recover Password 1</a></li>
                        <li><a href="pages-recoverpw-2">Recover Password 2</a></li>
                        <li><a href="pages-lock-screen">Lock Screen 1</a></li>
                        <li><a href="pages-lock-screen-2">Lock Screen 2</a></li>
                    </ul>
                </li>



                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="ti-more"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="#">Level 1.1</a></li>
                        <li><a href="#" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="#">Level 2.1</a></li>
                                <li><a href="#">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
