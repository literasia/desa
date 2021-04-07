<?php

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('admin')
    ->name('admin.')
    ->middleware(['auth', 'auth.admin'])
    ->group(function () {
        Route::get('/admin', 'adminController@index')
            ->name('index');

        // Library Setting
        Route::namespace('Library')
            ->group(function () {
                Route::get('/admin/library/setting', 'SettingController@index')
                    ->name('library.setting');
                Route::post('/admin/library/setting/tipe', 'SettingController@tipeStore')
                    ->name('library-tipe');
                Route::get('/admin/library/setting/tipe/{id}', 'SettingController@editTipe');
                Route::put('/admin/library/setting/tipe/update', 'SettingController@updateTipe')
                    ->name('library-tipe-update');
                Route::delete('/admin/library/tipe/delete/{id}', 'SettingController@deleteTipe')
                    ->name('library-tipe-delete');

                Route::get('/admin/library/tambah-baru', 'TambahController@index')
                    ->name('library.tambah-baru');
            });

        // List Desa
        Route::namespace('ListDesa')
            ->group(function () {
                Route::get('/admin/list-desa/list-desa', 'ListDesaController@index')
                    ->name('list-desa.list-desa');
                Route::post('/admin/list-desa/list-desa', 'ListDesaController@store');
                Route::get('/admin/list-desa/list-desa/{id}', 'ListDesaController@edit');
                Route::post('/admin/list-desa/list-desa/update', 'ListDesaController@update')
                    ->name('list-desa.list-desa-update');
                Route::get('/admin/list-desa/list-desa/hapus/{id}', 'ListDesaController@destroy');
            });

        // Referensi
        Route::namespace('Referensi')
            ->group(function () {
                // Jenis Kelamin
                Route::get('/admin/referensi/jenis-kelamin', 'JenisKelaminController@index')
                    ->name('referensi.jenis-kelamin');
                Route::post('/admin/referensi/jenis-kelamin', 'JenisKelaminController@store');
                Route::get('/admin/referensi/jenis-kelamin/{id}', 'JenisKelaminController@edit');
                Route::post('/admin/referensi/jenis-kelamin/update', 'JenisKelaminController@update')
                    ->name('referensi.jenis-kelamin-update');
                Route::get('/admin/referensi/jenis-kelamin/hapus/{id}', 'JenisKelaminController@destroy');

                // Agama
                Route::get('/admin/referensi/agama', 'AgamaController@index')
                    ->name('referensi.agama');
                Route::post('/admin/referensi/agama', 'AgamaController@store');
                Route::get('/admin/referensi/agama/{id}', 'AgamaController@edit');
                Route::post('/admin/referensi/agama/update', 'AgamaController@update')
                    ->name('referensi.agama-update');
                Route::get('/admin/referensi/agama/hapus/{id}', 'AgamaController@destroy');

                // Status Nikah
                Route::get('/admin/referensi/status-nikah', 'StatusNikahController@index')
                    ->name('referensi.status-nikah');
                Route::post('/admin/referensi/status-nikah', 'StatusNikahController@store');
                Route::get('/admin/referensi/status-nikah/{id}', 'StatusNikahController@edit');
                Route::post('/admin/referensi/status-nikah/update', 'StatusNikahController@update')
                    ->name('referensi.status-nikah-update');
                Route::get('/admin/referensi/status-nikah/hapus/{id}', 'StatusNikahController@destroy');

                // Provinsi
                Route::get('/admin/referensi/provinsi', 'ProvinsiController@index')
                    ->name('referensi.provinsi');
                Route::post('/admin/referensi/provinsi', 'ProvinsiController@store');
                Route::get('/admin/referensi/provinsi/{id}', 'ProvinsiController@edit');
                Route::post('/admin/referensi/provinsi/update', 'ProvinsiController@update')
                    ->name('referensi.provinsi-update');
                Route::get('/admin/referensi/provinsi/hapus/{id}', 'ProvinsiController@destroy');

                // Kabupaten/Kota
                Route::get('/admin/referensi/kabupaten-kota', 'KabupatenKotaController@index')
                    ->name('referensi.kabupaten-kota');
                Route::post('/admin/referensi/kabupaten-kota', 'KabupatenKotaController@store');
                Route::get('/admin/referensi/kabupaten-kota/{id}', 'KabupatenKotaController@edit');
                Route::post('/admin/referensi/kabupaten-kota/update', 'KabupatenKotaController@update')
                    ->name('referensi.kabupaten-kota-update');
                Route::get('/admin/referensi/kabupaten-kota/hapus/{id}', 'KabupatenKotaController@destroy');

                // Kecamatan
                Route::get('/admin/referensi/kecamatan', 'KecamatanController@index')
                    ->name('referensi.kecamatan');
                Route::post('/admin/referensi/kecamatan', 'KecamatanController@store');
                Route::get('/admin/referensi/kecamatan/{id}', 'KecamatanController@edit');
                Route::post('/admin/referensi/kecamatan/update', 'KecamatanController@update')
                    ->name('referensi.kecamatan-update');
                Route::get('/admin/referensi/kecamatan/hapus/{id}', 'KecamatanController@destroy');

                // Suku
                Route::get('/admin/referensi/suku', 'SukuController@index')
                    ->name('referensi.suku');
                Route::post('/admin/referensi/suku', 'SukuController@store');
                Route::get('/admin/referensi/suku/{id}', 'SukuController@edit');
                Route::post('/admin/referensi/suku/update', 'SukuController@update')
                    ->name('referensi.suku-update');
                Route::get('/admin/referensi/suku/hapus/{id}', 'SukuController@destroy');
        });

        // Library Setting
        Route::namespace('Library')
            ->group(function () {
                Route::get('/admin/library/setting', 'SettingController@index')
                    ->name('library.setting');
                Route::post('/admin/library/setting/tipe', 'SettingController@tipeStore')
                    ->name('library-tipe');
                Route::get('/admin/library/setting/tipe/{id}', 'SettingController@editTipe');
                Route::put('/admin/library/setting/tipe/update', 'SettingController@updateTipe')
                    ->name('library-tipe-update');
                Route::delete('/admin/library/tipe/delete/{id}', 'SettingController@deleteTipe')
                    ->name('library-tipe-delete');

                Route::get('/admin/library/tambah-baru', 'TambahController@index')
                    ->name('library.tambah-baru');
            });
    });

Route::namespace('Admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/admin', 'AdminController@index')
            ->name('index');

        // Administrasi
        Route::namespace('Administrasi')
            ->group(function () {
                Route::get('admin/administrasi/permohonan-pembuatan-ktp', 'PermohonanKTPController@index')
                    ->name('administrasi.permohonan-pembuatan-ktp');
                Route::get('/admin/administrasi/surat-keterangan-lahir', 'SuratKeteranganLahirController@index')
                    ->name('administrasi.surat-keterangan-lahir');
                Route::get('/admin/administrasi/perubahan-kk', 'PerubahanKKController@index')
                    ->name('administrasi.perubahan-kk');
                Route::get('/admin/administrasi/surat-kematian', 'SuratKematianController@index')
                    ->name('administrasi.surat-kematian');
                Route::get('/admin/administrasi/izin-usaha', 'IzinUsahaController@index')
                    ->name('administrasi.izin-usaha');
                Route::get('/admin/administrasi/keterangan-tidak-mampu', 'KeteranganTidakMampuController@index')
                    ->name('administrasi.keterangan-tidak-mampu');
                Route::get('/admin/administrasi/permohonan-skck', 'PermohonanSKCKController@index')
                    ->name('administrasi.permohonan-skck');
                Route::get('/admin/administrasi/keterangan-pindah', 'KeteranganPindahController@index')
                    ->name('administrasi.keterangan-pindah');
                Route::get('/admin/administrasi/keterangan-domisili', 'KeteranganDomisiliController@index')
                    ->name('administrasi.keterangan-domisili');
                Route::get('/desa/administrasi/keterangan-ahli-waris', 'KeteranganAhliWarisController@index')
                    ->name('administrasi.keterangan-ahli-waris');
                Route::get('/admin/administrasi/keterangan-tanah', 'KeteranganTanahController@index')
                    ->name('administrasi.keterangan-tanah');
            });

        // Berita
        Route::namespace('Berita')
            ->group(function () {

                // Berita
                Route::get('/admin/berita/berita', 'NewsController@index')
                ->name('berita.berita');
                Route::post('/admin/berita/berita', 'NewsController@store');
                Route::get('/admin/berita/berita/{id}', 'NewsController@edit');
                Route::post('/admin/berita/berita/update', 'NewsController@update')
                    ->name('berita.berita-update');
                Route::get('/admin/berita/berita/hapus/{id}', 'NewsController@destroy');
                
                // Kategori Berita
                Route::get('/admin/berita/kategori-berita', 'NewsCategoryController@index')
                    ->name('berita.kategori-berita');
                Route::post('/admin/berita/kategori-berita', 'NewsCategoryController@store');
                Route::get('/admin/berita/kategori-berita/{id}', 'NewsCategoryController@edit');
                Route::post('/admin/berita/kategori-berita/update', 'NewsCategoryController@update')
                    ->name('berita.kategori-berita-update');
                Route::get('/admin/berita/kategori-berita/hapus/{id}', 'NewsCategoryController@destroy');
            });

        // Data Penduduk
        Route::namespace('DataPenduduk')
            ->group(function () {
                Route::get('/admin/data-penduduk/keluarga', 'KeluargaController@index')
                    ->name('data-penduduk.keluarga');
                Route::get('/admin/data-penduduk/penduduk', 'PendudukController@index')
                    ->name('data-penduduk.penduduk');
                Route::get('/admin/data-penduduk/input-data-penduduk', 'InputDataPendudukController@index')
                    ->name('data-penduduk.penduduk.input-data-penduduk');
            });

        // Kalender
        Route::namespace('Kalender')
            ->group(function () {
            Route::get('/admin/kalender/kalender', 'KalenderController@index')
                ->name('kalender.kalender');
            });

        // Kampanye
        Route::namespace('Kampanye')
            ->group(function () {
            Route::get('/admin/kampanye', 'KampanyeController@index')
                ->name('kampanye.kampanye');
            });
        
        // Pengaduan
        Route::namespace('Pengaduan')
            ->group(function () {
            Route::get('/admin/pengaduan', 'PengaduanDesaController@index')
                 ->name('pengaduan.pengaduan');
            });

        // Pengumuman
        Route::namespace('Pengumuman')
            ->group(function () {
            Route::get('/admin/pengumuman', 'PengumumanDesaController@index')
                ->name('pengumuman.pengumuman');
            });

        // Perpustakaan
        Route::namespace('Perpustakaan')
            ->group(function () {
            Route::get('/admin/perpustakaan', 'PerpustakaanController@index')
                ->name('perpustakaan.perpustakaan');
            });

        Route::namespace('Peristiwa')
            ->group(function () {
                Route::get('/admin/peristiwa/kelahiran', 'KelahiranController@index')
                    ->name('peristiwa.kelahiran');
                Route::get('/admin/peristiwa/kematian', 'KematianController@index')
                    ->name('peristiwa.kematian');
                Route::get('/admin/peristiwa/pindah', 'PindahController@index')
                    ->name('peristiwa.pindah');
            }); 

        // Potensi
        Route::namespace('Potensi')
            ->group(function () {
                Route::get('/admin/potensi/potensi', 'PotensiDesaController@index')
                    ->name('potensi.potensi');
                Route::get('/admin/potensi/jenis-usaha', 'JenisUsahaController@index')
                    ->name('potensi.jenis-usaha');
                Route::get('/admin/potensi/kategori-usaha', 'KategoriUsahaController@index')
                    ->name('potensi.kategori-usaha'); 
            });

        // Profil
        Route::namespace('ProfilDesa')
            ->group(function () {
                Route::get('/admin/profil-desa', 'ProfilDesaController@index')
                    ->name('profil-desa.profil-desa'); 
            });

        // Referensi
        Route::namespace('Referensi')
            ->group(function () {
                Route::get('/admin/referensi/bagian-pegawai', 'BagianPegawaiController@index')
                    ->name('referensi.bagian-pegawai');
                Route::get('/admin/referensi/status-pegawai', 'StatusPegawaiController@index')
                    ->name('referensi.status-pegawai');
                Route::get('/admin/referensi/golongan', 'GolonganController@index')
                    ->name('referensi.golongan');
                Route::get('/admin/referensi/pengaturan-hak-akses', 'PengaturanHakAksesController@index')
                    ->name('referensi.pengaturan-hak-akses');
            });

        // Slider
        Route::namespace('Slider')
            ->group(function () {
                Route::get('/admin/slider/slider', 'SliderController@index')
                    ->name('slider.slider');
            });

        // Struktur
        Route::namespace('Struktur')
            ->group(function () {
                Route::get('/admin/struktur/struktur', 'StrukturDesaController@index')
                    ->name('struktur.struktur');
                Route::get('/admin/struktur/pegawai', 'PegawaiController@index')
                    ->name('struktur.pegawai');
                Route::get('/desa/struktur/jabatan', 'JabatanController@index')
                    ->name('struktur.jabatan');

            }); 

        // Wisata Desa
        Route::namespace('WisataDesa')
            ->group(function () {
                Route::get('/admin/wisata-desa', 'WisataDesaController@index')
                    ->name('wisata-desa.wisata-desa'); 
            });
    });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
