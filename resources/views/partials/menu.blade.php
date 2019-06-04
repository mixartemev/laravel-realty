<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <div class="nav-link">
            <i class="fas fa-spa">
                <span class="brand-text font-weight-light "> INV</span>
            </i>
            <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
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
                        <p>
                            <i class="fas fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

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
                                        <i class="fas fa-briefcase">

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
                                        <i class="fas fa-user">

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
                @can('address_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/buildings*') ? 'menu-open' : '' }} {{ request()->is('admin/regions*') ? 'menu-open' : '' }} {{ request()->is('admin/metro-stations*') ? 'menu-open' : '' }} {{ request()->is('admin/floors*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-map">

                            </i>
                            <p>
                                <span>{{ trans('cruds.address.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('building_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.buildings.index") }}" class="nav-link {{ request()->is('admin/buildings') || request()->is('admin/buildings/*') ? 'active' : '' }}">
                                        <i class="fas fa-building">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.building.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('region_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.regions.index") }}" class="nav-link {{ request()->is('admin/regions') || request()->is('admin/regions/*') ? 'active' : '' }}">
                                        <i class="fas fa-map-marker-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.region.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('metro_station_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.metro-stations.index") }}" class="nav-link {{ request()->is('admin/metro-stations') || request()->is('admin/metro-stations/*') ? 'active' : '' }}">
                                        <i class="fas fa-subway">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.metroStation.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('floor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.floors.index") }}" class="nav-link {{ request()->is('admin/floors') || request()->is('admin/floors/*') ? 'active' : '' }}">
                                        <i class="fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.floor.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('realty_object_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/realty-objects*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-hospital-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.realtyObject.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('realty_object_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.realty-objects.index") }}" class="nav-link {{ request()->is('admin/realty-objects') || request()->is('admin/realty-objects/*') ? 'active' : '' }}">
                                        <i class="fas fa-home">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.realtyObject.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-sign-out-alt">

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