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

        // Library Setting
        Route::namespace('Library')
            ->group(function () {
                Route::get('/superadmin/library/setting', 'SettingController@index')
                    ->name('library.setting');
                Route::post('/superadmin/library/setting/tipe', 'SettingController@tipeStore')
                    ->name('library-tipe');
                Route::get('/superadmin/library/setting/tipe/{id}', 'SettingController@editTipe');
                Route::put('/superadmin/library/setting/tipe/update', 'SettingController@updateTipe')
                    ->name('library-tipe-update');
                Route::delete('/superadmin/library/tipe/delete/{id}', 'SettingController@deleteTipe')
                    ->name('library-tipe-delete');

                Route::get('/superadmin/library/tambah-baru', 'TambahController@index')
                    ->name('library.tambah-baru');
            });

        // List Desa
        Route::namespace('ListDesa')
            ->group(function () {
                Route::get('/superadmin/list-desa/list-desa', 'ListDesaController@index')
                    ->name('list-desa.list-desa');
                Route::post('/superadmin/list-desa/list-desa', 'ListDesaController@store');
                Route::get('/superadmin/list-desa/list-desa/{id}', 'ListDesaController@edit');
                Route::post('/superadmin/list-desa/list-desa/update', 'ListDesaController@update')
                    ->name('list-desa.list-desa-update');
                Route::get('/superadmin/list-desa/list-desa/hapus/{id}', 'ListDesaController@destroy');
            });

        // Referensi
        Route::namespace('Referensi')
            ->group(function () {
                // Jenis Kelamin
                Route::get('/superadmin/referensi/jenis-kelamin', 'JenisKelaminController@index')
                    ->name('referensi.jenis-kelamin');
                Route::post('/superadmin/referensi/jenis-kelamin', 'JenisKelaminController@store');
                Route::get('/superadmin/referensi/jenis-kelamin/{id}', 'JenisKelaminController@edit');
                Route::post('/superadmin/referensi/jenis-kelamin/update', 'JenisKelaminController@update')
                    ->name('referensi.jenis-kelamin-update');
                Route::get('/superadmin/referensi/jenis-kelamin/hapus/{id}', 'JenisKelaminController@destroy');

                // Agama
                Route::get('/superadmin/referensi/agama', 'AgamaController@index')
                    ->name('referensi.agama');
                Route::post('/superadmin/referensi/agama', 'AgamaController@store');
                Route::get('/superadmin/referensi/agama/{id}', 'AgamaController@edit');
                Route::post('/superadmin/referensi/agama/update', 'AgamaController@update')
                    ->name('referensi.agama-update');
                Route::get('/superadmin/referensi/agama/hapus/{id}', 'AgamaController@destroy');

                // Status Nikah
                Route::get('/superadmin/referensi/status-nikah', 'StatusNikahController@index')
                    ->name('referensi.status-nikah');
                Route::post('/superadmin/referensi/status-nikah', 'StatusNikahController@store');
                Route::get('/superadmin/referensi/status-nikah/{id}', 'StatusNikahController@edit');
                Route::post('/superadmin/referensi/status-nikah/update', 'StatusNikahController@update')
                    ->name('referensi.status-nikah-update');
                Route::get('/superadmin/referensi/status-nikah/hapus/{id}', 'StatusNikahController@destroy');

                // Provinsi
                Route::get('/superadmin/referensi/provinsi', 'ProvinsiController@index')
                    ->name('referensi.provinsi');
                Route::post('/superadmin/referensi/provinsi', 'ProvinsiController@store');
                Route::get('/superadmin/referensi/provinsi/{id}', 'ProvinsiController@edit');
                Route::post('/superadmin/referensi/provinsi/update', 'ProvinsiController@update')
                    ->name('referensi.provinsi-update');
                Route::get('/superadmin/referensi/provinsi/hapus/{id}', 'ProvinsiController@destroy');

                // Kabupaten/Kota
                Route::get('/superadmin/referensi/kabupaten-kota', 'KabupatenKotaController@index')
                    ->name('referensi.kabupaten-kota');
                Route::post('/superadmin/referensi/kabupaten-kota', 'KabupatenKotaController@store');
                Route::get('/superadmin/referensi/kabupaten-kota/{id}', 'KabupatenKotaController@edit');
                Route::post('/superadmin/referensi/kabupaten-kota/update', 'KabupatenKotaController@update')
                    ->name('referensi.kabupaten-kota-update');
                Route::get('/superadmin/referensi/kabupaten-kota/hapus/{id}', 'KabupatenKotaController@destroy');

                // Kecamatan
                Route::get('/superadmin/referensi/kecamatan', 'KecamatanController@index')
                    ->name('referensi.kecamatan');
                Route::post('/superadmin/referensi/kecamatan', 'KecamatanController@store');
                Route::get('/superadmin/referensi/kecamatan/{id}', 'KecamatanController@edit');
                Route::post('/superadmin/referensi/kecamatan/update', 'KecamatanController@update')
                    ->name('referensi.kecamatan-update');
                Route::get('/superadmin/referensi/kecamatan/hapus/{id}', 'KecamatanController@destroy');

                // Suku
                Route::get('/superadmin/referensi/suku', 'SukuController@index')
                    ->name('referensi.suku');
                Route::post('/superadmin/referensi/suku', 'SukuController@store');
                Route::get('/superadmin/referensi/suku/{id}', 'SukuController@edit');
                Route::post('/superadmin/referensi/suku/update', 'SukuController@update')
                    ->name('referensi.suku-update');
                Route::get('/superadmin/referensi/suku/hapus/{id}', 'SukuController@destroy');
        });

        // Library Setting
        Route::namespace('Library')
            ->group(function () {
                Route::get('/superadmin/library/setting', 'SettingController@index')
                    ->name('library.setting');
                Route::post('/superadmin/library/setting/tipe', 'SettingController@tipeStore')
                    ->name('library-tipe');
                Route::get('/superadmin/library/setting/tipe/{id}', 'SettingController@editTipe');
                Route::put('/superadmin/library/setting/tipe/update', 'SettingController@updateTipe')
                    ->name('library-tipe-update');
                Route::delete('/superadmin/library/tipe/delete/{id}', 'SettingController@deleteTipe')
                    ->name('library-tipe-delete');

                Route::get('/superadmin/library/tambah-baru', 'TambahController@index')
                    ->name('library.tambah-baru');
            });
    });

Route::namespace('Desa')
    ->name('desa.')
    ->group(function () {
        Route::get('/desa', 'DesaController@index')
            ->name('index');

        // Administrasi
        Route::namespace('Administrasi')
            ->group(function () {
                Route::get('/desa/administrasi/permohonan-pembuatan-ktp', 'PermohonanKTPController@index')
                    ->name('administrasi.permohonan-pembuatan-ktp');
                Route::get('/desa/administrasi/surat-keterangan-lahir', 'SuratKeteranganLahirController@index')
                    ->name('administrasi.surat-keterangan-lahir');
                Route::get('/desa/administrasi/perubahan-kk', 'PerubahanKKController@index')
                    ->name('administrasi.perubahan-kk');
                Route::get('/desa/administrasi/surat-kematian', 'SuratKematianController@index')
                    ->name('administrasi.surat-kematian');
                Route::get('/desa/administrasi/izin-usaha', 'IzinUsahaController@index')
                    ->name('administrasi.izin-usaha');
                Route::get('/desa/administrasi/keterangan-tidak-mampu', 'KeteranganTidakMampuController@index')
                    ->name('administrasi.keterangan-tidak-mampu');
                Route::get('/desa/administrasi/permohonan-skck', 'PermohonanSKCKController@index')
                    ->name('administrasi.permohonan-skck');
                Route::get('/desa/administrasi/keterangan-pindah', 'KeteranganPindahController@index')
                    ->name('administrasi.keterangan-pindah');
                Route::get('/desa/administrasi/keterangan-domisili', 'KeteranganDomisiliController@index')
                    ->name('administrasi.keterangan-domisili');
                Route::get('/desa/administrasi/keterangan-ahli-waris', 'KeteranganAhliWarisController@index')
                    ->name('administrasi.keterangan-ahli-waris');
                Route::get('/desa/administrasi/keterangan-tanah', 'KeteranganTanahController@index')
                    ->name('administrasi.keterangan-tanah');
            });

        // Berita
        Route::namespace('Berita')
            ->group(function () {

                Route::get('/desa/berita/berita', 'BeritaController@index')
                    ->name('berita.berita');
                Route::get('/desa/berita/kategori-berita', 'KategoriBeritaController@index')
                    ->name('berita.kategori-berita');
            });

        // Data Penduduk
        Route::namespace('DataPenduduk')
            ->group(function () {
                Route::get('/desa/data-penduduk/keluarga', 'KeluargaController@index')
                    ->name('data-penduduk.keluarga');
                Route::get('/desa/data-penduduk/penduduk', 'PendudukController@index')
                    ->name('data-penduduk.penduduk');
                Route::get('/desa/data-penduduk/input-data-penduduk', 'InputDataPendudukController@index')
                    ->name('data-penduduk.penduduk.input-data-penduduk');
            });

        // Kalender
        Route::namespace('Kalender')
            ->group(function () {
            Route::get('/desa/kalender', 'KalenderDesaController@index')
                ->name('kalender.kalender');
            });

        // Kampanye
        Route::namespace('Kampanye')
            ->group(function () {
            Route::get('/desa/kampanye', 'KampanyeController@index')
                ->name('kampanye.kampanye');
            });
        
        // Pengaduan
        Route::namespace('Pengaduan')
            ->group(function () {
            Route::get('/desa/pengaduan', 'PengaduanDesaController@index')
                 ->name('pengaduan.pengaduan');
            });

        // Pengumuman
        Route::namespace('Pengumuman')
            ->group(function () {
            Route::get('/desa/pengumuman', 'PengumumanDesaController@index')
                ->name('pengumuman.pengumuman');
            });

        // Perpustakaan
        Route::namespace('Perpustakaan')
            ->group(function () {
            Route::get('/desa/perpustakaan', 'PerpustakaanController@index')
                ->name('perpustakaan.perpustakaan');
            });

        Route::namespace('Peristiwa')
            ->group(function () {
                Route::get('/desa/peristiwa/kelahiran', 'KelahiranController@index')
                    ->name('peristiwa.kelahiran');
                Route::get('/desa/peristiwa/kematian', 'KematianController@index')
                    ->name('peristiwa.kematian');
                Route::get('/desa/peristiwa/pindah', 'PindahController@index')
                    ->name('peristiwa.pindah');
            }); 

        // Potensi
        Route::namespace('Potensi')
            ->group(function () {
                Route::get('/desa/potensi/potensi', 'PotensiDesaController@index')
                    ->name('potensi.potensi');
                Route::get('/desa/potensi/jenis-usaha', 'JenisUsahaController@index')
                    ->name('potensi.jenis-usaha');
                Route::get('/desa/potensi/kategori-usaha', 'KategoriUsahaController@index')
                    ->name('potensi.kategori-usaha'); 
            });

        // Profil
        Route::namespace('ProfilDesa')
            ->group(function () {
                Route::get('/desa/profil-desa', 'ProfilDesaController@index')
                    ->name('profil-desa.profil-desa'); 
            });

        // Referensi
        Route::namespace('Referensi')
            ->group(function () {
                Route::get('/desa/referensi/bagian-pegawai', 'BagianPegawaiController@index')
                    ->name('referensi.bagian-pegawai');
                Route::get('/desa/referensi/status-pegawai', 'StatusPegawaiController@index')
                    ->name('referensi.status-pegawai');
                Route::get('/desa/referensi/golongan', 'GolonganController@index')
                    ->name('referensi.golongan');
                Route::get('/desa/referensi/pengaturan-hak-akses', 'PengaturanHakAksesController@index')
                    ->name('referensi.pengaturan-hak-akses');
            });

        // Slider
        Route::namespace('Slider')
            ->group(function () {
                Route::get('/desa/slider/slider', 'SliderController@index')
                    ->name('slider.slider');
            });

        // Struktur
        Route::namespace('Struktur')
            ->group(function () {
                Route::get('/desa/struktur/struktur', 'StrukturDesaController@index')
                    ->name('struktur.struktur');
                Route::get('/desa/struktur/pegawai', 'PegawaiController@index')
                    ->name('struktur.pegawai');
                Route::get('/desa/struktur/jabatan', 'JabatanController@index')
                    ->name('struktur.jabatan');
            }); 

        // Wisata Desa
        Route::namespace('WisataDesa')
            ->group(function () {
                Route::get('/desa/wisata-desa', 'WisataDesaController@index')
                    ->name('wisata-desa.wisata-desa'); 
            });
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
