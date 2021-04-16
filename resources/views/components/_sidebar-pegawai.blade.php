<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->is('admin') ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="@if (request()->is('admin/data-penduduk/keluarga') || request()->is('admin/data-penduduk/penduduk')) pcoded-hasmenu active pcoded-trigger @else pcoded-hasmenu @endif">
                    <a href="javascript:void(0);" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-users"></i></span>
                        <span class="pcoded-mtext">Data Penduduk</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('admin/data-penduduk/keluarga') ? 'active' : '' }}">
                            <a href="{{ route('admin.data-penduduk.keluarga') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Keluarga</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/data-penduduk/penduduk') ? 'active' : '' }}">
                            <a href="{{ route('admin.data-penduduk.penduduk') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Penduduk</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
