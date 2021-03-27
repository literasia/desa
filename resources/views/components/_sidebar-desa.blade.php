<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->is('desa') ? 'active' : '' }}">
                    <a href="{{ route('desa.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>

                <li class="{{ request()->is('desa/sturktur') ? 'active' : '' }}">
                     <a href="{{ route('desa.struktur.struktur') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-key"></i>
                        </span>
                        <span class="pcoded-mtext">Struktur Desa</span>
                    </a>
                </li>
                <li class="{{ request()->is('desa/potensi') ? 'active' : '' }}">
                     <a href="{{ route('desa.potensi.potensi') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="icon-chart"></i>
                        </span>
                        <span class="pcoded-mtext">Potensi Desa</span>
                    </a>
                </li>
                <li class="@if (request()->is('desa/administrasi/permohonan-pembuatan-ktp') || request()->is('desa/administrasi/surat-keterangan-lahir') || request()->is('desa/administrasi/perubahan-kk') || request()->is('desa/administrasi/surat-kematian') || request()->is('desa/administrasi/izin-usaha') || request()->is('desa/administrasi/keterangan-tidak-mampu')) pcoded-hasmenu active pcoded-trigger @else pcoded-hasmenu @endif">
                    <a href="javascript:void(0);" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-archive"></i></span>
                        <span class="pcoded-mtext">Administrasi</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('desa/administrasi/permohonan-pembuatan-ktp') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.permohonan-pembuatan-ktp') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Permohonan Pembuatan KTP</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/surat-keterangan-lahir') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.surat-keterangan-lahir') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Surat Lahir</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/perubahan-kk') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.perubahan-kk') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Perubahan Kartu Keluarga</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/surat-kematian') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.surat-kematian') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Surat Kematian</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/izin-usaha') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.izin-usaha') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Izin Usaha</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/keterangan-tidak-mampu') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.keterangan-tidak-mampu') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Keterangan Tidak Mampu</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/permohonan-pembuatan-ktp') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.permohonan-pembuatan-ktp') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Permohonan SKCK</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/permohonan-pembuatan-ktp') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.permohonan-pembuatan-ktp') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Keterangan Pindah</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/permohonan-pembuatan-ktp') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.permohonan-pembuatan-ktp') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Keterangan Domisili</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/permohonan-pembuatan-ktp') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.permohonan-pembuatan-ktp') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Keterangan Berkelakuan Baik</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/permohonan-pembuatan-ktp') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.permohonan-pembuatan-ktp') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Keterangan Ahli Waris</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/administrasi/permohonan-pembuatan-ktp') ? 'active' : '' }}">
                            <a href="{{ route('desa.administrasi.permohonan-pembuatan-ktp') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Keterangan Tanah</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="@if (request()->is('desa/data-penduduk/keluarga') || request()->is('desa/data-penduduk/penduduk')) pcoded-hasmenu active pcoded-trigger @else pcoded-hasmenu @endif">
                    <a href="javascript:void(0);" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-users"></i></span>
                        <span class="pcoded-mtext">Data Penduduk</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('desa/data-penduduk/keluarga') ? 'active' : '' }}">
                            <a href="{{ route('desa.data-penduduk.keluarga') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Keluarga</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/data-penduduk/penduduk') ? 'active' : '' }}">
                            <a href="{{ route('desa.data-penduduk.penduduk') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Penduduk</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('desa/kampanye') ? 'active' : '' }}">
                     <a href="{{ route('desa.kampanye.kampanye') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-bell"></i>
                        </span>
                        <span class="pcoded-mtext">Kampanye</span>
                    </a>
                </li>
                <li class="{{ request()->is('desa/kegiatan') ? 'active' : '' }}">
                     <a href="{{ route('desa.kegiatan.kegiatan') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-calendar-check"></i>
                        </span>
                        <span class="pcoded-mtext">Kegiatan</span>
                    </a>
                </li>
                <li class="{{ request()->is('desa/kalender') ? 'active' : '' }}">
                    <a href="{{ route('desa.kalender.kalender') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <span class="pcoded-mtext">Kalender</span>
                    </a>
                </li>
                <li class="{{ request()->is('desa/pengumuman') ? 'active' : '' }}">
                     <a href="{{ route('desa.pengumuman.pengumuman') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-bell"></i>
                        </span>
                        <span class="pcoded-mtext">Pengumuman</span>
                    </a>
                </li>
                <li class="@if (request()->is('desa/referensi/bagian-pegawai') || request()->is('desa/referensi/status-pegawai') || request()->is('desa/referensi/golongan') || request()->is('desa/referensi/pengaturan-hak-akses')) pcoded-hasmenu active pcoded-trigger @else pcoded-hasmenu @endif">
                    <a href="javascript:void(0);" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-list-alt"></i></span>
                        <span class="pcoded-mtext">Referensi</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('desa/referensi/bagian-pegawai') ? 'active' : '' }}">
                            <a href="{{ route('desa.referensi.bagian-pegawai') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Bagian Pegawai</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/referensi/status-pegawai') ? 'active' : '' }}">
                            <a href="{{ route('desa.referensi.status-pegawai') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Status Pegawai</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/referensi/golongan') ? 'active' : '' }}">
                            <a href="{{ route('desa.referensi.golongan') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Golongan</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('desa/referensi/pengaturan-hak-akses') ? 'active' : '' }}">
                            <a href="{{ route('desa.referensi.pengaturan-hak-akses') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Pengaturan Hak Akses</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('desa/perpustakaan') ? 'active' : '' }}">
                    <a href="{{ route('desa.perpustakaan.perpustakaan') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-book-open"></i>
                        </span>
                        <span class="pcoded-mtext">Perpustakaan</span>
                    </a>
                </li>
                <li class="{{ request()->is('desa/pengaduan') ? 'active' : '' }}">
                    <a href="{{ route('desa.pengaduan.pengaduan') }}" class="waves-effect waves-dark">
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