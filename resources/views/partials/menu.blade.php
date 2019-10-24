<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('service_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.services.index") }}" class="nav-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-prescription-bottle-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.service.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('doctor_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.doctors.index") }}" class="nav-link {{ request()->is('admin/doctors') || request()->is('admin/doctors/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user-md">

                            </i>
                            <p>
                                <span>{{ trans('cruds.doctor.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('appointment_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.appointments.index") }}" class="nav-link {{ request()->is('admin/appointments') || request()->is('admin/appointments/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-calendar-check">

                            </i>
                            <p>
                                <span>{{ trans('cruds.appointment.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('profile_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.profiles.index") }}" class="nav-link {{ request()->is('admin/profiles') || request()->is('admin/profiles/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.profile.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('healthcare_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/hospitals*') ? 'menu-open' : '' }} {{ request()->is('admin/branches*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-briefcase-medical">

                            </i>
                            <p>
                                <span>{{ trans('cruds.healthcare.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('hospital_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.hospitals.index") }}" class="nav-link {{ request()->is('admin/hospitals') || request()->is('admin/hospitals/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-hospital-symbol">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.hospital.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('branch_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.branches.index") }}" class="nav-link {{ request()->is('admin/branches') || request()->is('admin/branches/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-hospital-symbol">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.branch.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @php($unread = \App\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'active' : '' }} nav-link">
                            <i class="fa-fw fa fa-envelope">

                            </i>
                            <span>{{ trans('global.messages') }}</span>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt">

                                </i>
                                <span>{{ trans('global.logout') }}</span>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>