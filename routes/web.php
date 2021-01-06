<?php

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Superadmin')
    ->name('superadmin.')
    ->middleware(['auth', 'auth.superadmin'])
    ->group(function () {
        Route::get('/superadmin', 'SuperadminController@index')
            ->name('index');
        Route::get('/superadmin/list-sekolah', 'ListSekolahController@index')
            ->name('list-sekolah');
    });

Route::namespace('Admin')
    ->name('admin.')
    ->middleware(['auth', 'auth.admin'])
    ->group(function () {
        Route::get('/admin', 'AdminController@index')
            ->name('index');

        // Peserta Didik
        Route::namespace('PesertaDidik')
            ->group(function () {
                Route::get('/admin/peserta-didik/siswa', 'SiswaController@index')
                    ->name('pesertadidik.siswa');
                Route::get('/admin/peserta-didik/alumni', 'AlumniController@index')
                    ->name('pesertadidik.alumni');
                Route::get('/admin/peserta-didik/pindah-kelas', 'PindahKelasController@index')
                    ->name('pesertadidik.pindah-kelas');
                Route::get('/admin/peserta-didik/tidak-naik-kelas', 'TidakNaikKelasController@index')
                    ->name('pesertadidik.tidak-naik-kelas');
                Route::get('/admin/peserta-didik/pengaturan-siswa-per-kelas', 'PengaturanSiswaPerKelasController@index')
                    ->name('pesertadidik.pengaturan-siswa-per-kelas');
                Route::get('/admin/peserta-didik/siswa-pindahan', 'SiswaPindahanController@index')
                    ->name('pesertadidik.siswa-pindahan');
            });

        // Pelanggaran
        Route::namespace('Pelanggaran')
            ->group(function () {
                Route::get('/admin/pelanggaran/siswa', 'SiswaController@index')
                    ->name('pelanggaran.siswa');
                Route::get('/admin/pelanggaran/kategori-pelanggaran', 'KategoriPelanggaranController@index')
                    ->name('pelanggaran.kategori-pelanggaran');
                Route::get('/admin/pelanggaran/sanksi', 'SanksiController@index')
                    ->name('pelanggaran.sanksi');
            });

        // E-Voting
        Route::namespace('EVoting')
            ->group(function () {
                Route::get('/admin/e-voting/calon', 'CalonController@index')
                    ->name('e-voting.calon');
                Route::get('/admin/e-voting/posisi', 'PosisiController@index')
                    ->name('e-voting.posisi');
                Route::get('/admin/e-voting/pemilihan', 'PemilihanController@index')
                    ->name('e-voting.pemilihan');
                Route::get('/admin/e-voting/vote', 'VoteController@index')
                    ->name('e-voting.vote');
            });

        // Fungsionaris
        Route::namespace('Fungsionaris')
            ->group(function () {
                Route::get('/admin/fungsionaris/pegawai', 'PegawaiController@index')
                    ->name('fungsionaris.pegawai');
                Route::get('/admin/fungsionaris/guru', 'GuruController@index')
                    ->name('fungsionaris.guru');
            });

        // Absensi
        Route::namespace('Absensi')
            ->group(function () {
                Route::get('/admin/absensi/siswa', 'SiswaController@index')
                    ->name('absensi.siswa');
                Route::get('/admin/absensi/rekap-siswa', 'RekapSiswaController@index')
                    ->name('absensi.rekap-siswa');
            });

        // Referensi
        Route::namespace('Referensi')
            ->group(function () {
                // Bagian Pegawai
                Route::get('/admin/referensi/bagian-pegawai', 'BagianPegawaiController@index')
                    ->name('referensi.bagian-pegawai');
                Route::post('/admin/referensi/bagian-pegawai', 'BagianPegawaiController@store');
                Route::get('/admin/referensi/bagian-pegawai/{id}', 'BagianPegawaiController@edit');
                Route::post('/admin/referensi/bagian-pegawai/update', 'BagianPegawaiController@update')
                    ->name('referensi.bagian-pegawai-update');
                Route::get('/admin/referensi/bagian-pegawai/hapus/{id}', 'BagianPegawaiController@destroy');

                // Semester
                Route::get('/admin/referensi/semester', 'SemesterController@index')
                    ->name('referensi.semester');
                Route::post('/admin/referensi/semester', 'SemesterController@store');
                Route::get('/admin/referensi/semester/{id}', 'SemesterController@edit');
                Route::post('/admin/referensi/semester/update', 'SemesterController@update')
                    ->name('referensi.semester-update');
                Route::get('/admin/referensi/semester/hapus/{id}', 'SemesterController@destroy');

                // Status Guru
                Route::get('/admin/referensi/status-guru', 'StatusGuruController@index')
                    ->name('referensi.status-guru');
                Route::post('/admin/referensi/status-guru', 'StatusGuruController@store');
                Route::get('/admin/referensi/status-guru/{id}', 'StatusGuruController@edit');
                Route::post('/admin/referensi/status-guru/update', 'StatusGuruController@update')
                    ->name('referensi.status-guru-update');
                Route::get('/admin/referensi/status-guru/hapus/{id}', 'StatusGuruController@destroy');

                // Jenjang pegawai
                Route::get('/admin/referensi/jenjang-pegawai', 'JenjangPegawaiController@index')
                    ->name('referensi.jenjang-pegawai');
                Route::post('/admin/referensi/jenjang-pegawai', 'JenjangPegawaiController@store');
                Route::get('/admin/referensi/jenjang-pegawai/{id}', 'JenjangPegawaiController@edit');
                Route::post('/admin/referensi/jenjang-pegawai/update', 'JenjangPegawaiController@update')
                    ->name('referensi.jenjang-pegawai-update');
                Route::get('/admin/referensi/jenjang-pegawai/hapus/{id}', 'JenjangPegawaiController@destroy');

                Route::get('/admin/referensi/pengaturan-hak-akses', 'PengaturanHakAksesController@index')
                    ->name('referensi.pengaturan-hak-akses');

                // Tingkatan Kelas
                Route::get('/admin/referensi/tingkatan-kelas', 'TingkatanKelasController@index')
                    ->name('referensi.tingkatan-kelas');
                Route::post('/admin/referensi/tingkatan-kelas', 'TingkatanKelasController@store');
                Route::get('/admin/referensi/tingkatan-kelas/{id}', 'TingkatanKelasController@edit');
                Route::post('/admin/referensi/tingkatan-kelas/update', 'TingkatanKelasController@update')
                    ->name('referensi.tingkatan-kelas-update');
                Route::get('/admin/referensi/tingkatan-kelas/hapus/{id}', 'TingkatanKelasController@destroy');
            });

        // Kalender
        Route::namespace('Kalender')
            ->group(function () {
                Route::get('/admin/kalender/kalender-akademik', 'KalenderAkademikController@index')
                    ->name('kalender.kalender-akademik');
            });

        // Pengumuman
        Route::namespace('Pengumuman')
            ->group(function () {
                Route::get('/admin/pengumuman/pesan', 'PesanController@index')
                    ->name('pengumuman.pesan');
            });
    });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
