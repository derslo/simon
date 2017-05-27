@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}"
                         class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

                <!-- ======================================= -->
                <li class="header">SiMon</li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-bars"></i> <span>Stammdaten</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/location') }}"><i
                                        class="fa fa-building"></i> <span>Standorte</span></a></li>
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/organisation') }}"><i
                                        class="fa fa-sitemap"></i> <span>Organisation</span></a></li>
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/contact') }}"><i
                                        class="fa fa-address-card"></i> <span>Kontakt</span></a></li>
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/os') }}"><i
                                        class="fa fa-linux"></i> <span>Betriebssystem</span></a></li>
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/storage') }}"><i
                                        class="fa fa-hdd-o"></i> <span>Speichersystem</span></a></li>
                    </ul>
                </li>

                <li class="header">{{ trans('backpack::base.administration') }}</li>
                <!-- ================================================ -->
                <!-- ==== Recommended place for admin menu items ==== -->
                <!-- ================================================ -->
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i
                                class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a>
                </li>
                @role('superadmin')
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i
                                class="fa fa-files-o"></i> <span>File manager</span></a></li>
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/setting') }}"><i
                                class="fa fa-cog"></i> <span>Settings</span></a></li>
            @endrole

            <!-- Users, Roles Permissions -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/user') }}"><i
                                        class="fa fa-user"></i> <span>Users</span></a></li>
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i
                                        class="fa fa-group"></i> <span>Roles</span></a></li>
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }}"><i
                                        class="fa fa-key"></i> <span>Permissions</span></a></li>
                    </ul>
                </li>

                <!-- ======================================= -->
                <li class="header">{{ trans('backpack::base.user') }}</li>
                <li><a href="{{ route('home') }}"><i class="fa fa-sign-out"></i>
                        <span>{{ trans('backpack::base.logout') }}</span></a></li>



            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>
@endif
