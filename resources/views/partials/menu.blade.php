<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link logo-inv">
        <div class="px-2">
            <img class="" src="/img/inv.png"><img class="brand-text" src="/img/estate.png">
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <p>{{ trans('global.dashboard') }}</p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }} {{ request()->is('admin/audit-logs*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fa-fw fas fa-users"></i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt"></i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase"></i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user"></i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-file-alt"></i>
                                        <p>
                                            <span>{{ trans('cruds.auditLog.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('address_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/regions*') ? 'menu-open' : '' }} {{ request()->is('admin/metro-stations*') ? 'menu-open' : '' }} {{ request()->is('admin/buildings*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fa-fw fas fa-map"></i>
                            <p>
                                <span>{{ trans('cruds.address.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('region_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.regions.index") }}" class="nav-link {{ request()->is('admin/regions') || request()->is('admin/regions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-map-marker-alt"></i>
                                        <p>
                                            <span>{{ trans('cruds.region.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('building_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.buildings.index") }}" class="nav-link {{ request()->is('admin/buildings') || request()->is('admin/buildings/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-building"></i>
                                        <p>
                                            <span>{{ trans('cruds.building.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('realty_object_access')
                    <li class="nav-item has-treeview {{--{{ request()->is('admin/floors*') ? 'menu-open' : '' }} --}}{{ request()->is('admin/realty-objects*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fa-fw fas fa-home"></i>
                            <p>
                                <span>{{ trans('cruds.realtyObject.title_objects') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('realty_object_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.realty-objects.index") }}" class="nav-link {{ request()->is('admin/realty-objects/*') ? 'active' : '' }}">
                                        <i class="fa-fw fab fa-buromobelexperte"></i>
                                        <p>
                                            <span>{{ trans('cruds.realtyObject.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            {{--@can('floor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.floors.index") }}" class="nav-link {{ request()->is('admin/floors') || request()->is('admin/floors/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-stream"></i>
                                        <p>
                                            <span>{{ trans('cruds.floor.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan--}}
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <p>{{ trans('global.logout') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>