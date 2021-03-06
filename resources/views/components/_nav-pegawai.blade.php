<?php
$notif = App\Models\AdminMessage::all();
$profile = App\Models\VillageProfile::where('village_id', auth()->user()->village->id)->get();
$potensi = App\Models\Potency::where('village_id', auth()->user()->village_id)->where('status' ,'inactive')->orderByDesc('created_at')->get();
$pengaduan = App\Models\Admin\Complaint::where('village_id', auth()->user()->village_id)->where('status' ,'accepted')->orderByDesc('created_at')->get();

$count = count($notif) + count($potensi) + count($pengaduan);


?>
<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a href="/admin">
                <img class="img-fluid" src="{{ asset('img/logo-putih.png') }}" alt="logo-literasia.png" width="180" />
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="icon-menu icon-toggle-right"></i>
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            {{-- Nav Left --}}
            <ul class="nav-left">
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-prepend search-close">
                            <i class="feather icon-x input-group-text"></i>
                        </span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-append search-btn">
                            <i class="feather icon-search input-group-text"></i>
                        </span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                    <i class="full-screen feather icon-maximize"></i>
                </a>
                </li>
            </ul>

            {{-- Nav Right --}}
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="badge bg-c-red">{{count($notif)}}</span>
                        </div>
                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <h6>Notifications</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            @foreach ($notif as $n)
                            <li>
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="notification-user">{{$n->title}}</h5>
                                        <p class="notification-msg">{{$n->message}}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="user-profile header-notification">

                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('img/avatar.png') }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{ auth()->user()->name }}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <span id="profile-employee" class="profile-employee" role="button">
                                    <i class="icon-user"></i> Ganti Password
                                </span>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="feather icon-log-out"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
@include('components.modals._profile-pegawai-setting')
