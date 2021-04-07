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
                <li class="@if (request()->is('admin/struktur/struktur') || request()->is('admin/struktur/pegawai') || request()->is('admin/struktur/jabatan')) pcoded-hasmenu active pcoded-trigger @else pcoded-hasmenu @endif">
                    <a href="javascript:void(0);" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-project-diagram"></i></span>
                        <span class="pcoded-mtext">Struktur Desa</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('admin/struktur/struktur') ? 'active' : '' }}">
                            <a href="{{ route('admin.struktur.struktur') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Struktur</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/struktur/pegawai') ? 'active' : '' }}">
                            <a href="{{ route('admin.struktur.pegawai') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Pegawai</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/struktur/jabatan') ? 'active' : '' }}">
                            <a href="{{ route('admin.struktur.jabatan') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Jabatan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/profil-desa') ? 'active' : '' }}">
                     <a href="{{ route('admin.profil-desa.profil-desa') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-id-badge"></i>
                        </span>
                        <span class="pcoded-mtext">Profil Desa</span>
                    </a>
                </li>
                <li class="@if (request()->is('admin/administrasi/permohonan-pembuatan-ktp') || request()->is('admin/administrasi/surat-keterangan-lahir') || request()->is('admin/administrasi/perubahan-kk') || request()->is('admin/administrasi/surat-kematian') || request()->is('admin/administrasi/izin-usaha') || request()->is('admin/administrasi/keterangan-tidak-mampu') || request()->is('admin/administrasi/permohonan-skck') || request()->is('admin/administrasi/keterangan-pindah') || request()->is('admin/administrasi/keterangan-domisili') || request()->is('admin/administrasi/keterangan-ahli-waris') || request()->is('admin/administrasi/keterangan-tanah')) pcoded-hasmenu active pcoded-trigger @else pcoded-hasmenu @endif">
                    <a href="javascript:void(0);" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-archive"></i></span>
                        <span class="pcoded-mtext">Administrasi</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('admin/administrasi/permohonan-pembuatan-ktp') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.permohonan-pembuatan-ktp') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Permohonan KTP
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/administrasi/surat-keterangan-lahir') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.surat-keterangan-lahir') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Surat Lahir
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/administrasi/perubahan-kk') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.perubahan-kk') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Perubahan KK
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/administrasi/surat-kematian') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.surat-kematian') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Surat Kematian
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/administrasi/izin-usaha') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.izin-usaha') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Izin Usaha
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/administrasi/keterangan-tidak-mampu') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.keterangan-tidak-mampu') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Ket. Tidak Mampu
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/administrasi/permohonan-skck') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.permohonan-skck') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Permohonan SKCK
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/administrasi/keterangan-pindah') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.keterangan-pindah') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Keterangan Pindah
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/administrasi/keterangan-domisili') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.keterangan-domisili') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Keterangan Domisili
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/administrasi/keterangan-ahli-waris') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.keterangan-ahli-waris') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Keterangan Ahli Waris
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/administrasi/keterangan-tanah') ? 'active' : '' }}">
                            <a href="{{ route('admin.administrasi.keterangan-tanah') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">
                                    <label class="notification-label-danger"></label>
                                    <label class="notification-label-warning mr-2"></label>
                                    Keterangan Tanah
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="@if (request()->is('admin/potensi/potensi') || request()->is('admin/potensi/jenis-usaha') || request()->is('admin/potensi/kategori-usaha')) pcoded-hasmenu active pcoded-trigger @else pcoded-hasmenu @endif">
                    <a href="javascript:void(0);" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="icon-chart"></i></span>
                        <span class="pcoded-mtext">Potensi Desa</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('admin/potensi/potensi') ? 'active' : '' }}">
                            <a href="{{ route('admin.potensi.potensi') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Potensi Desa</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/potensi/jenis-usaha') ? 'active' : '' }}">
                            <a href="{{ route('admin.potensi.jenis-usaha') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Jenis Usaha</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/potensi/kategori-usaha') ? 'active' : '' }}">
                            <a href="{{ route('admin.potensi.kategori-usaha') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Kategori Usaha</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="@if (request()->is('admin/berita/berita') || request()->is('admin/berita/kategori-berita')) pcoded-hasmenu active pcoded-trigger @else pcoded-hasmenu @endif">
                    <a href="#" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-newspaper"></i>
                        </span>
                        <span class="pcoded-mtext">Berita</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('admin/berita/berita') ? 'active' : '' }}">
                            <a href="{{ route('admin.berita.berita') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Berita</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/berita/kategori-berita') ? 'active' : '' }}">
                            <a href="{{ route('admin.berita.kategori-berita') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Kategori</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/slider/slider') ? 'active' : '' }}">
                    <a href="{{ route('admin.slider.slider') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-gitlab"></i>
                        </span>
                        <span class="pcoded-mtext">Slider</span>
                    </a>
                </li>
                <li class="@if (request()->is('admin/peristiwa/kelahiran') || request()->is('admin/peristiwa/kematian') || request()->is('admin/peristiwa/pindah')) pcoded-hasmenu active pcoded-trigger @else pcoded-hasmenu @endif">
                    <a href="javascript:void(0);" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="icon-chart"></i></span>
                        <span class="pcoded-mtext">Peristiwa</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('admin/peristiwa/kelahiran') ? 'active' : '' }}">
                            <a href="{{ route('admin.peristiwa.kelahiran') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Kelahiran</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/peristiwa/kematian') ? 'active' : '' }}">
                            <a href="{{ route('admin.peristiwa.kematian') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Kematian</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/peristiwa/pindah') ? 'active' : '' }}">
                            <a href="{{ route('admin.peristiwa.pindah') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Perpindahan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/wisata-desa') ? 'active' : '' }}">
                     <a href="{{ route('admin.wisata-desa.wisata-desa') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-map-marker-alt"></i>
                        </span>
                        <span class="pcoded-mtext">Wisata Desa</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/kalender') ? 'active' : '' }}">
                    <a href="{{ route('admin.kalender.kalender') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <span class="pcoded-mtext">Kalender</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/pengumuman') ? 'active' : '' }}">
                     <a href="{{ route('admin.pengumuman.pengumuman') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-bell"></i>
                        </span>
                        <span class="pcoded-mtext">Pengumuman</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/kampanye') ? 'active' : '' }}">
                     <a href="{{ route('admin.kampanye.kampanye') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-bullhorn"></i>
                        </span>
                        <span class="pcoded-mtext">Kampanye</span>
                    </a>
                </li>
                <li class="@if (request()->is('admin/referensi/pengaturan-hak-akses')) pcoded-hasmenu active pcoded-trigger @else pcoded-hasmenu @endif">
                    <a href="javascript:void(0);" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-list-alt"></i></span>
                        <span class="pcoded-mtext">Referensi</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('admin/referensi/pengaturan-hak-akses') ? 'active' : '' }}">
                            <a href="{{ route('admin.referensi.pengaturan-hak-akses') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Pengaturan Hak Akses</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/perpustakaan') ? 'active' : '' }}">
                    <a href="{{ route('admin.perpustakaan.perpustakaan') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-book-open"></i>
                        </span>
                        <span class="pcoded-mtext">Perpustakaan</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/pengaduan') ? 'active' : '' }}">
                    <a href="{{ route('admin.pengaduan.pengaduan') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-comment-alt"></i>
                        </span>
                        <span class="pcoded-mtext">Pengaduan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
