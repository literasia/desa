<?php

use Illuminate\Support\Facades\{Route, Auth};

Route::get('/', function () {
    return view('welcome');
});

// Superadmin route
Route::namespace('Superadmin')
    ->name('superadmin.')
    ->middleware(['auth', 'auth.superadmin'])
    ->group(function () {
        Route::get('/superadmin', 'SuperadminController@index')
            ->name('index');

        // Library
        Route::namespace('Library')
            ->group(function () {
                // Tambah
                Route::get('/superadmin/library/tambah-baru', 'TambahController@index')
                    ->name('library.tambah-baru');

                // Library Setting
                Route::get('/superadmin/library/setting', 'SettingController@index')
                    ->name('library.setting');
                Route::post('/superadmin/library/setting/tipe', 'SettingController@tipeStore')
                    ->name('library-tipe');
                Route::get('/superadmin/library/setting/tipe/{id}', 'SettingController@editTipe');
                Route::put('/superadmin/library/setting/tipe/update', 'SettingController@updateTipe')
                    ->name('library-tipe-update');
                Route::delete('/superadmin/library/tipe/delete/{id}', 'SettingController@deleteTipe')
                    ->name('library-tipe-delete');
            });

        // List Desa
        Route::namespace('ListDesa')
            ->group(function () {
                Route::get('/superadmin/list-desa/list-desa', 'ListDesaController@index')
                    ->name('list-desa.list-desa');
                Route::post('/superadmin/list-desa/list-desa', 'ListDesaController@store')
                    ->name("list-desa.list-desa.store");
                Route::get('/superadmin/list-desa/list-desa/{id}', 'ListDesaController@edit')
                    ->name("list-desa.list-desa.edit");
                Route::post('/superadmin/list-desa/list-desa/update', 'ListDesaController@update')
                    ->name('list-desa.list-desa.update');
                Route::get('/superadmin/list-desa/list-desa/hapus/{id}', 'ListDesaController@destroy')
                    ->name("list-desa.list-desa.delete");
        });

        // Kalender
        Route::namespace('Kalender')
            ->group(function () {
                Route::get('/superadmin/kalender', 'KalenderSuperadminController@index')
                    ->name('kalender.kalender');
                    Route::post('/superadmin/kalender/tambah', 'KalenderSuperadminController@store')->name('superadmin.kalender.tambah-event');
                    Route::post('/superadmin/kalender/update/{id}', 'KalenderSuperadminController@update')->name('superadmin.kalender.edit-event');
                    Route::get('/superadmin/kalender/hapus/{id}', 'KalenderSuperadminController@destroy');
            });

        // Pengumuman
        Route::namespace('Pengumuman')
        ->group(function () {
        Route::get('/superadmin/pengumuman', 'PengumumanDesaController@index')
            ->name('pengumuman.pengumuman');
        Route::post('/superadmin/pengumuman/pesan/add', 'PengumumanDesaController@store')->name('pengumuman.pesan-add');
        Route::get('/superadmin/pengumuman/pesan/{id}', 'PengumumanDesaController@edit');
        Route::post('/superadmin/pengumuman/pesan/update', 'PengumumanDesaController@update')
            ->name('pengumuman.pesan-update');
        Route::get('/superadmin/pengumuman/pesan/hapus/{id}', 'PengumumanDesaController@destroy');
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
                Route::get('/supersuperadmin/referensi/suku/hapus/{id}', 'SukuController@destroy');
            });
    });

// Pegawai route
Route::namespace("Pegawai")
    ->name("pegawai.")
    ->middleware(['auth','auth.pegawai'])
    ->group(function(){
        Route::get('/pegawai', 'PegawaiController@index')
            ->name('index');

        // Rekap Absensi : pegawai
        Route::namespace('Absensi')
            ->group(function () {
                Route::get('/pegawai/absensi/rekap-pegawai', 'RekapPegawaiController@index')
                    ->name('absensi.rekap-pegawai');
            });

        // Struktur : Pegawai
        Route::namespace('Struktur')
            ->group(function () {
                // Struktur Desa
                Route::get('/pegawai/struktur/struktur', 'StrukturDesaController@index')
                    ->name('struktur.struktur');
                Route::post('/pegawai/struktur/struktur', 'StrukturDesaController@store')
                    ->name('struktur.struktur.store');
                Route::get('/pegawai/struktur/struktur/{id}', 'StrukturDesaController@edit')
                    ->name('struktur.struktur.edit');
                Route::post('/pegawai/struktur/struktur/update', 'StrukturDesaController@update')
                    ->name('struktur.struktur.update');
                Route::get('/pegawai/struktur/struktur/hapus/{id}', 'StrukturDesaController@destroy')
                    ->name('struktur.struktur.delete');
                // route get some data for modals structures
                Route::get('/pegawai/struktur/get_employee', 'StrukturDesaController@getEmployee')
                    ->name('struktur.struktur.get_employee');
                Route::get('/pegawai/struktur/get_position', 'StrukturDesaController@getPosition')
                    ->name('struktur.struktur.get_position');
                Route::get('/pegawai/struktur/get_village_structure', 'StrukturDesaController@getVillageStructure')
                    ->name('struktur.struktur.get_village_structure');

                // Pegawai
                Route::get('/pegawai/struktur/pegawai', 'PegawaiController@index')
                    ->name('struktur.pegawai');
                Route::post('/pegawai/struktur/pegawai', 'PegawaiController@store')
                    ->name('struktur.pegawai.store');
                Route::get('/pegawai/struktur/pegawai/{id}', 'PegawaiController@edit')
                    ->name('struktur.pegawai.edit');
                Route::post('/pegawai/struktur/pegawai/update', 'PegawaiController@update')
                    ->name('struktur.pegawai.update');
                Route::get('/pegawai/struktur/pegawai/hapus/{id}', 'PegawaiController@destroy')
                    ->name('struktur.pegawai.delete');

                // Jabatan
                Route::get('/pegawai/struktur/jabatan', 'JabatanController@index')
                    ->name('struktur.jabatan');
                Route::post('/pegawai/struktur/jabatan', 'JabatanController@store')
                    ->name('struktur.jabatan.store');
                Route::get('/pegawai/struktur/jabatan/{id}', 'JabatanController@edit')
                    ->name('struktur.jabatan.edit');
                Route::post('/pegawai/struktur/jabatan/update', 'JabatanController@update')
                    ->name('struktur.jabatan.update');
                Route::get('/pegawai/struktur/jabatan/hapus/{id}', 'JabatanController@destroy')
                    ->name('struktur.jabatan.delete');

            });


        // Kalender : pegawai
        Route::namespace('Kalender')
        ->group(function () {
            //Kalender
            Route::get('/pegawai/kalender/kalender', 'KalenderDesaController@index')
                ->name('kalender.kalender');
            Route::post('/pegawai/kalender/tambah', 'KalenderDesaController@store')->name('kalender.tambah-event');
            Route::post('/pegawai/kalender/update/{id}', 'KalenderDesaController@update')->name('kalender.edit-event');
            Route::get('/pegawai/kalender/hapus/{id}', 'KalenderDesaController@destroy');

            // Kegiatan Desa
            Route::get('/pegawai/kalender/kegiatan-desa', 'KegiatanDesaController@index')
                ->name('kalender.kegiatan-desa');

            //Kategori Desa
            Route::get('/pegawai/kalender/kategori-kegiatan', 'KategoriKegiatanController@index')
                ->name('kalender.kategori-kegiatan');
                Route::post('/pegawai/kalender/kategori-kegiatan', 'KategoriKegiatanController@store');
                Route::post('/pegawai/kalender/kategori-kegiatan/update', 'KategoriKegiatanController@update')
                ->name('kalender.kategori.update');
                Route::get('/pegawai/kalender/kategori-kegiatan/edit/{id}', 'KategoriKegiatanController@edit');
                Route::get('/pegawai/kalender/kategori-kegiatan/hapus/{id}', 'KategoriKegiatanController@destroy');
        });

        // Wisata desa
        Route::namespace('WisataDesa')
            ->group(function () {
                Route::get('/pegawai/wisata-desa', 'VillageTourController@index')
                    ->name('wisata-desa.wisata-desa');
                Route::post('/pegawai/wisata-desa', 'VillageTourController@store');
                Route::get('/pegawai/wisata-desa/wisata-desa/{id}', 'VillageTourController@edit');
                Route::post('/pegawai/wisata-desa/wisata-desa/update', 'VillageTourController@update')
                    ->name('wisata-desa.wisata-desa-update');
                Route::get('/pegawai/wisata-desa/wisata-desa/hapus/{id}', 'VillageTourController@destroy');
            });

        // Profil : pegawai
        Route::namespace('ProfilDesa')
            ->group(function () {
                Route::get('/pegawai/profil-desa', 'ProfilDesaController@index')
                    ->name('profil-desa.profil-desa');
            });

        // Data Penduduk : pegawai
        Route::namespace('DataPenduduk')
            ->group(function () {
                Route::get('/pegawai/data-penduduk/keluarga', 'KeluargaController@index')
                    ->name('data-penduduk.keluarga');
                Route::get('/pegawai/data-penduduk/penduduk', 'PendudukController@index')
                    ->name('data-penduduk.penduduk');
                // Route::get('/pegawai/data-penduduk/input-data-penduduk', 'InputDataPendudukController@index')
                //     ->name('data-penduduk.penduduk.input-data-penduduk');
            });


        // Pengumuman : pegawai
        Route::namespace('Pengumuman')
            ->group(function () {
            Route::get('/pegawai/pengumuman', 'PengumumanDesaController@index')
                ->name('pengumuman.pengumuman');
            Route::post('/pegawai/pengumuman/pesan/add', 'PengumumanDesaController@store')->name('pengumuman.pesan-add');
            Route::get('/pegawai/pengumuman/pesan/{id}', 'PengumumanDesaController@edit');
            Route::post('/pegawai/pengumuman/pesan/update', 'PengumumanDesaController@update')
                ->name('pengumuman.pesan-update');
            Route::get('/pegawai/pengumuman/pesan/hapus/{id}', 'PengumumanDesaController@destroy');
            });

        // Pengaduan : pegawai
        Route::namespace('Pengaduan')
            ->group(function () {
            Route::get('/pegawai/pengaduan', 'PengaduanDesaController@index')
                    ->name('pengaduan.pengaduan');
            Route::get('/pegawai/pengaduan/hapus/{id}', 'PengaduanDesaController@destroy');
            });

        // Perpustakaan : pegawai
        Route::namespace('Perpustakaan')
            ->group(function () {
            Route::get('/pegawai/perpustakaan', 'PerpustakaanController@index')
                ->name('perpustakaan.perpustakaan');
            });

        // Berita : pegawai
        Route::namespace('Berita')
            ->group(function () {

                // Berita
                Route::get('/pegawai/berita/berita', 'NewsController@index')
                ->name('berita.berita');
                Route::post('/pegawai/berita/berita', 'NewsController@store');
                Route::get('/pegawai/berita/berita/{id}', 'NewsController@edit');
                Route::post('/pegawai/berita/berita/update', 'NewsController@update')
                    ->name('berita.berita-update');
                Route::get('/pegawai/berita/berita/hapus/{id}', 'NewsController@destroy');

                // Kategori Berita
                Route::get('/pegawai/berita/kategori-berita', 'NewsCategoryController@index')
                    ->name('berita.kategori-berita');
                Route::post('/pegawai/berita/kategori-berita', 'NewsCategoryController@store');
                Route::get('/pegawai/berita/kategori-berita/{id}', 'NewsCategoryController@edit');
                Route::post('/pegawai/berita/kategori-berita/update', 'NewsCategoryController@update')
                    ->name('berita.kategori-berita-update');
                Route::get('/pegawai/berita/kategori-berita/hapus/{id}', 'NewsCategoryController@destroy');
            });


        // Potensi : pegawai
        Route::namespace('Potensi')
        ->group(function () {
            Route::get('/pegawai/potensi/potensi', 'PotensiDesaController@index')
                ->name('potensi.potensi');
            Route::get('/pegawai/potensi/hapus/{id}', 'PotensiDesaController@destroy');
            Route::post('/pegawai/potensi/potensi/update/{id}', 'PotensiDesaController@update');

            //Jenis Usaha
            Route::get('/pegawai/potensi/jenis-usaha', 'JenisUsahaController@index')
                ->name('potensi.jenis-usaha');
            Route::post('/pegawai/potensi/jenis-usaha', 'JenisUsahaController@store');
            Route::post('/pegawai/potensi/jenis-usaha/update', 'JenisUsahaController@update')
                ->name('potensi.jenis-usaha.update');
            Route::get('/pegawai/potensi/jenis-usaha/edit/{id}', 'JenisUsahaController@edit');
            Route::get('/pegawai/potensi/jenis-usaha/hapus/{id}', 'JenisUsahaController@destroy');


            //Kategori Usaha
            Route::get('/pegawai/potensi/kategori-usaha', 'KategoriUsahaController@index')
            ->name('potensi.kategori-usaha');
            Route::post('/pegawai/potensi/kategori-usaha', 'KategoriUsahaController@store');
            Route::post('/pegawai/potensi/kategori-usaha/update', 'KategoriUsahaController@update')
            ->name('potensi.category.update');
            Route::get('/pegawai/potensi/kategori-usaha/edit/{id}', 'KategoriUsahaController@edit');
            Route::get('/pegawai/potensi/kategori-usaha/hapus/{id}', 'KategoriUsahaController@destroy');
        });

        // Slider : pegawai
        Route::namespace('Slider')
        ->group(function () {
            Route::get('/pegawai/slider/slider', 'SliderController@index')
                ->name('slider.slider');
            Route::post('/pegawai/slider', 'SliderController@store')
                ->name('slider.store');
            Route::get('/pegawai/slider/{id}', 'SliderController@edit')->name('slider.edit');
            Route::post('/pegawai/slider/update', 'SliderController@update')
                ->name('slider.update');
            Route::get('/pegawai/slider/destroy/{id}', 'SliderController@destroy')
                ->name('slider.destroy');
        });

        // Kampanye : pegawai
        Route::namespace('Kampanye')
            ->group(function () {
                Route::get('/pegawai/kampanye/kampanye', 'CampaignController@index')
                ->name('kampanye.kampanye');
                Route::post('/pegawai/kampanye/kampanye', 'CampaignController@store');
                Route::get('/pegawai/kampanye/kampanye/{id}', 'CampaignController@edit');
                Route::post('/pegawai/kampanye/kampanye/update', 'CampaignController@update')
                    ->name('kampanye.kampanye-update');
                Route::get('/pegawai/kampanye/kampanye/hapus/{id}', 'CampaignController@destroy');
            });

        // Peristiwa : pegawai
        Route::namespace('Peristiwa')
        ->group(function () {
            Route::get('/pegawai/peristiwa/kelahiran', 'KelahiranController@index')
                ->name('peristiwa.kelahiran');

            Route::get('/pegawai/peristiwa/kematian', 'KematianController@index')
                ->name('peristiwa.kematian');

            Route::get('/pegawai/peristiwa/pindah', 'PindahController@index')
                ->name('peristiwa.pindah');
        });

        // Administrasi : pegawai
        Route::namespace('Administrasi')
        ->group(function () {
            Route::get('pegawai/administrasi/permohonan-pembuatan-ktp', 'PermohonanKTPController@index')
                ->name('administrasi.permohonan_pembuatan_ktp');
            Route::get('/pegawai/administrasi/surat-keterangan-lahir', 'SuratKeteranganLahirController@index')
                ->name('administrasi.surat_keterangan_lahir');

            Route::get('/pegawai/administrasi/perubahan-kk', 'PerubahanKKController@index')
                ->name('administrasi.perubahan-kk');
            Route::get('/pegawai/administrasi/perubahan-kk/{id}', 'PerubahanKKController@edit');
            Route::post('/pegawai/administrasi/perubahan-kk/update', 'PerubahanKKController@update')
                ->name('administrasi.perubahan-kk.update');
            Route::get('/pegawai/administrasi/perubahan-kk/hapus/{id}', 'PerubahanKKController@destroy');

            //Surat Kematian
            Route::get('/pegawai/administrasi/surat-kematian', 'SuratKematianController@index')
                ->name('administrasi.surat-kematian');
            Route::get('/pegawai/administrasi/surat-kematian/{id}', 'SuratKematianController@edit');
            Route::post('/pegawai/administrasi/surat-kematian/update', 'SuratKematianController@update')
                ->name('administrasi.surat-kematian.update');
            Route::get('/pegawai/administrasi/surat-kematian/hapus/{id}', 'SuratKematianController@destroy');

            Route::get('/pegawai/administrasi/izin-usaha', 'IzinUsahaController@index')
                ->name('administrasi.izin_usaha');
            Route::get('/pegawai/administrasi/keterangan-tidak-mampu', 'KeteranganTidakMampuController@index')
                ->name('administrasi.keterangan_tidak_mampu');

            //SKCK
            Route::get('/pegawai/administrasi/permohonan-skck', 'PermohonanSKCKController@index')
                ->name('administrasi.permohonan-skck');
            Route::get('/pegawai/administrasi/permohonan-skck/{id}', 'PermohonanSKCKController@edit');
            Route::post('/pegawai/administrasi/permohonan-skck/update', 'PermohonanSKCKController@update')
                ->name('administrasi.permohonan-skck-update');
            Route::get('/pegawai/administrasi/permohonan-skck/hapus/{id}', 'PermohonanSKCKController@destroy');

            Route::get('/pegawai/administrasi/keterangan-pindah', 'KeteranganPindahController@index')
                ->name('administrasi.keterangan-pindah');

            // Domisili
            Route::get('/pegawai/administrasi/keterangan-domisili', 'KeteranganDomisiliController@index')
                ->name('administrasi.keterangan-domisili');
            Route::get('/pegawai/administrasi/keterangan-domisili/{id}', 'KeteranganDomisiliController@edit');
            Route::post('/pegawai/administrasi/keterangan-domisili/update', 'KeteranganDomisiliController@update')
                ->name('administrasi.keterangan-domisili-update');
            Route::get('/pegawai/administrasi/keterangan-domisili/hapus/{id}', 'KeteranganDomisiliController@destroy');

            // Ahli Waris
            Route::get('/pegawai/administrasi/keterangan-ahli-waris', 'KeteranganAhliWarisController@index')
                ->name('administrasi.keterangan-ahli-waris');
            Route::get('/pegawai/administrasi/keterangan-ahli-waris/{id}', 'KeteranganAhliWarisController@edit');
            Route::post('/pegawai/administrasi/keterangan-ahli-waris/update', 'KeteranganAhliWarisController@update')
                ->name('administrasi.keterangan-ahli-waris-update');
            Route::get('/pegawai/administrasi/keterangan-ahli-waris/hapus/{id}', 'KeteranganAhliWarisController@destroy');


            Route::get('/pegawai/administrasi/keterangan-tanah', 'KeteranganTanahController@index')
                ->name('administrasi.keterangan-tanah');
        });

    });

// Admin route
Route::namespace('Admin')
    ->name('admin.')
    ->middleware(['auth', 'auth.admin'])
    ->group(function () {
        Route::get('/admin', 'AdminController@index')
            ->name('index');

        // Absensi
        Route::namespace('Absensi')
            ->group(function () {
                Route::get('/admin/absensi/pegawai', 'AbsensiPegawaiController@index')
                    ->name('absensi.pegawai');
                Route::post('/admin/absensi/pegawai', 'AbsensiPegawaiController@write')
                    ->name('absensi.pegawai.write');
                Route::get('/admin/absensi/rekap-pegawai', 'RekapPegawaiController@index')
                    ->name('absensi.rekap-pegawai');
            });

        // Administrasi
        Route::namespace('Administrasi')
            ->group(function () {
                Route::get('admin/administrasi/permohonan-pembuatan-ktp', 'PermohonanKTPController@index')
                    ->name('administrasi.permohonan_pembuatan_ktp');
                Route::get('/admin/administrasi/permohonan-pembuatan-ktp/{id}', 'PermohonanKTPController@edit');
                Route::post('/admin/administrasi/permohonan-pembuatan-ktp/update', 'PermohonanKTPController@update')
                    ->name('administrasi.permohonan-pembuatan-ktp.update');
                Route::get('/admin/administrasi/permohonan-pembuatan-ktp/hapus/{id}', 'PermohonanKTPController@destroy');

                Route::get('/admin/administrasi/surat-keterangan-lahir', 'SuratKeteranganLahirController@index')
                    ->name('administrasi.surat_keterangan_lahir');
                Route::get('/admin/administrasi/surat-keterangan-lahir/{id}', 'SuratKeteranganLahirController@edit');
                Route::post('/admin/administrasi/surat-keterangan-lahir/update', 'SuratKeteranganLahirController@update')
                    ->name('administrasi.surat-keterangan-lahir.update');
                Route::get('/admin/administrasi/surat-keterangan-lahir/hapus/{id}', 'SuratKeteranganLahirController@destroy');

                Route::get('/admin/administrasi/perubahan-kk', 'PerubahanKKController@index')
                    ->name('administrasi.perubahan-kk');
                Route::get('/admin/administrasi/perubahan-kk/{id}', 'PerubahanKKController@edit');
                Route::post('/admin/administrasi/perubahan-kk/update', 'PerubahanKKController@update')
                    ->name('administrasi.perubahan-kk.update');
                Route::get('/admin/administrasi/perubahan-kk/hapus/{id}', 'PerubahanKKController@destroy');

                //Surat Kematian
                Route::get('/admin/administrasi/surat-kematian', 'SuratKematianController@index')
                    ->name('administrasi.surat-kematian');
                Route::get('/admin/administrasi/surat-kematian/{id}', 'SuratKematianController@edit');
                Route::post('/admin/administrasi/surat-kematian/update', 'SuratKematianController@update')
                    ->name('administrasi.surat-kematian.update');
                Route::get('/admin/administrasi/surat-kematian/hapus/{id}', 'SuratKematianController@destroy');

                // izin usaha
                Route::get('/admin/administrasi/izin-usaha', 'IzinUsahaController@index')
                    ->name('administrasi.izin_usaha');
                Route::get('/admin/administrasi/izin-usaha/{id}', 'IzinUsahaController@edit');
                Route::post('/admin/administrasi/izin-usaha/update', 'IzinUsahaController@update')
                    ->name('administrasi.izin-usaha.update');
                Route::get('/admin/administrasi/izin-usaha/hapus/{id}', 'IzinUsahaController@destroy');

                // SKTM
                Route::get('/admin/administrasi/keterangan-tidak-mampu', 'KeteranganTidakMampuController@index')
                    ->name('administrasi.keterangan_tidak_mampu');
                Route::get('/admin/administrasi/keterangan-tidak-mampu/{id}', 'KeteranganTidakMampuController@edit');
                Route::post('/admin/administrasi/keterangan-tidak-mampu/update', 'KeteranganTidakMampuController@update')
                    ->name('administrasi.keterangan-tidak-mampu.update');
                Route::get('/admin/administrasi/keterangan-tidak-mampu/hapus/{id}', 'KeteranganTidakMampuController@destroy');

                //SKCK
                Route::get('/admin/administrasi/permohonan-skck', 'PermohonanSKCKController@index')
                    ->name('administrasi.permohonan-skck');
                Route::get('/admin/administrasi/permohonan-skck/{id}', 'PermohonanSKCKController@edit');
                Route::post('/admin/administrasi/permohonan-skck/update', 'PermohonanSKCKController@update')
                    ->name('administrasi.permohonan-skck-update');
                Route::get('/admin/administrasi/permohonan-skck/hapus/{id}', 'PermohonanSKCKController@destroy');

                // PINDAH
                Route::get('/admin/administrasi/keterangan-pindah', 'KeteranganPindahController@index')
                    ->name('administrasi.keterangan-pindah');
                Route::get('/admin/administrasi/keterangan-pindah/{id}', 'KeteranganPindahController@edit');
                Route::post('/admin/administrasi/keterangan-pindah/update', 'KeteranganPindahController@update')
                    ->name('administrasi.keterangan-pindah.update');
                Route::get('/admin/administrasi/keterangan-pindah/hapus/{id}', 'KeteranganPindahController@destroy');

                // Domisili
                Route::get('/admin/administrasi/keterangan-domisili', 'KeteranganDomisiliController@index')
                    ->name('administrasi.keterangan-domisili');
                Route::get('/admin/administrasi/keterangan-domisili/{id}', 'KeteranganDomisiliController@edit');
                Route::post('/admin/administrasi/keterangan-domisili/update', 'KeteranganDomisiliController@update')
                    ->name('administrasi.keterangan-domisili-update');
                Route::get('/admin/administrasi/keterangan-domisili/hapus/{id}', 'KeteranganDomisiliController@destroy');

                // Ahli Waris
                Route::get('/admin/administrasi/keterangan-ahli-waris', 'KeteranganAhliWarisController@index')
                    ->name('administrasi.keterangan-ahli-waris');
                Route::get('/admin/administrasi/keterangan-ahli-waris/{id}', 'KeteranganAhliWarisController@edit');
                Route::post('/admin/administrasi/keterangan-ahli-waris/update', 'KeteranganAhliWarisController@update')
                    ->name('administrasi.keterangan-ahli-waris-update');
                Route::get('/admin/administrasi/keterangan-ahli-waris/hapus/{id}', 'KeteranganAhliWarisController@destroy');

                // Keterangan Tanah
                Route::get('/admin/administrasi/keterangan-tanah', 'KeteranganTanahController@index')
                    ->name('administrasi.keterangan-tanah');
                Route::get('/admin/administrasi/keterangan-tanah/{id}', 'KeteranganTanahController@edit');
                Route::post('/admin/administrasi/keterangan-tanah/update', 'KeteranganTanahController@update')
                    ->name('administrasi.keterangan-tanah.update');
                Route::get('/admin/administrasi/keterangan-tanah/hapus/{id}', 'KeteranganTanahController@destroy');
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

        // Bantuan Sosial
        Route::namespace('BantuanSosial')
            ->group(function () {

                // Bantuan Sosial Keluarga
                Route::get('/admin/bantuan-sosial/bantuan-sosial-keluarga', 'BantuanSosialKeluargaController@index')->name('bantuan-sosial.bantuan-sosial-keluarga');
                Route::post('/admin/bantuan-sosial/bantuan-sosial-keluarga', 'BantuanSosialKeluargaController@store')->name('bantuan-sosial.bantuan-sosial-keluarga.store');
                Route::get('/admin/bantuan-sosial/bantuan-sosial-keluarga/{id}', 'BantuanSosialKeluargaController@edit')->name('bantuan-sosial.bantuan-sosial-keluarga.edit');
                Route::post('/admin/bantuan-sosial/bantuan-sosial-keluarga/update', 'BantuanSosialKeluargaController@update')->name('bantuan-sosial.bantuan-sosial-keluarga.update');
                Route::post('/admin/bantuan-sosial/bantuan-sosial-keluarga/update-status', 'BantuanSosialKeluargaController@updateStatus')->name('bantuan-sosial.bantuan-sosial-keluarga.update-status');
                Route::get('/admin/bantuan-sosial/bantuan-sosial-keluarga/hapus/{id}', 'BantuanSosialKeluargaController@destroy')->name('bantuan-sosial.bantuan-sosial-keluarga.destroy');

                // Bantuan Sosial Individu
                Route::get('/admin/bantuan-sosial/bantuan-sosial-individu', 'BantuanSosialIndividuController@index')->name('bantuan-sosial.bantuan-sosial-individu');
                Route::post('/admin/bantuan-sosial/bantuan-sosial-individu', 'BantuanSosialIndividuController@store')->name('bantuan-sosial.bantuan-sosial-individu.store');
                Route::get('/admin/bantuan-sosial/bantuan-sosial-individu/{id}', 'BantuanSosialIndividuController@edit')->name('bantuan-sosial.bantuan-sosial-individu.edit');
                Route::post('/admin/bantuan-sosial/bantuan-sosial-individu/update', 'BantuanSosialIndividuController@update')->name('bantuan-sosial.bantuan-sosial-individu.update');
                Route::post('/admin/bantuan-sosial/bantuan-sosial-individu/update-status', 'BantuanSosialIndividuController@updateStatus')->name('bantuan-sosial.bantuan-sosial-individu.update-status');
                Route::get('/admin/bantuan-sosial/bantuan-sosial-individu/hapus/{id}', 'BantuanSosialIndividuController@destroy')->name('bantuan-sosial.bantuan-sosial-individu.destroy');

                // Jenis Bantuan Sosial
                Route::get('/admin/bantuan-sosial/jenis-bantuan-sosial', 'JenisBantuanSosialController@index')->name('bantuan-sosial.jenis-bantuan-sosial');
                Route::post('/admin/bantuan-sosial/jenis-bantuan-sosial', 'JenisBantuanSosialController@store')->name('bantuan-sosial.jenis-bantuan-sosial.store');
                Route::get('/admin/bantuan-sosial/jenis-bantuan-sosial/{id}', 'JenisBantuanSosialController@edit')->name('bantuan-sosial.jenis-bantuan-sosial.edit');
                Route::post('/admin/bantuan-sosial/jenis-bantuan-sosial/update', 'JenisBantuanSosialController@update')->name('bantuan-sosial.jenis-bantuan-sosial.update');
                Route::get('/admin/bantuan-sosial/jenis-bantuan-sosial/hapus/{id}', 'JenisBantuanSosialController@destroy')->name('bantuan-sosial.jenis-bantuan-sosial.destroy');
            });

        // Sambutan Kepala Desa
        Route::namespace('SambutanKepalaDesa')
            ->group(function () {
                // Sambutan
                Route::get('/admin/sambutan-kepala-desa', 'SambutanKepalaDesaController@index')->name('sambutan-kepala-desa');
                Route::post('/admin/sambutan-kepala-desa/update', 'SambutanKepalaDesaController@update')->name('sambutan-kepala-desa.update');
            });

        // Data Penduduk
        Route::namespace('DataPenduduk')
        ->group(function () {

                Route::get('/admin/data-penduduk/keluarga/get-family/{id}', 'KeluargaController@getFamily')->name('data-penduduk.keluarga.get-family');
                Route::get('/admin/data-penduduk/keluarga/get-citizen', 'KeluargaController@getCitizen')->name('data-penduduk.keluarga.get-citizen');

                // Penduduk
                Route::get('/admin/data-penduduk/keluarga', 'KeluargaController@index')->name('data-penduduk.keluarga');
                Route::post('/admin/data-penduduk/keluarga', 'KeluargaController@store')->name('data-penduduk.keluarga.store');
                Route::get('/admin/data-penduduk/keluarga/{id}', 'KeluargaController@edit')->name('data-penduduk.keluarga.edit');
                Route::post('/admin/data-penduduk/keluarga/update', 'KeluargaController@update')->name('data-penduduk.keluarga.update');
                Route::get('/admin/data-penduduk/keluarga/hapus/{id}', 'KeluargaController@destroy')->name('data-penduduk.keluarga.delete');


                Route::get('/admin/data-penduduk/penduduk', 'PendudukController@index')
                    ->name('data-penduduk.penduduk');
                // Route::get('/admin/data-penduduk/input-data-penduduk', 'InputDataPendudukController@index')
                //     ->name('data-penduduk.penduduk.input-data-penduduk');
            });

        // Kalender
        Route::namespace('Kalender')
            ->group(function () {
                //Kalender
                Route::get('/admin/kalender/kalender', 'KalenderDesaController@index')
                    ->name('kalender.kalender');
                Route::post('/admin/kalender/tambah', 'KalenderDesaController@store')->name('kalender.tambah-event');
                Route::post('/admin/kalender/update/{id}', 'KalenderDesaController@update')->name('kalender.edit-event');
                Route::get('/admin/kalender/hapus/{id}', 'KalenderDesaController@destroy');

                // Kegiatan Desa
                Route::get('/admin/kalender/kegiatan-desa', 'KegiatanDesaController@index')
                    ->name('kalender.kegiatan-desa');

                //Kategori Desa
                Route::get('/admin/kalender/kategori-kegiatan', 'KategoriKegiatanController@index')
                    ->name('kalender.kategori-kegiatan');
                    Route::post('/admin/kalender/kategori-kegiatan', 'KategoriKegiatanController@store');
                    Route::post('/admin/kalender/kategori-kegiatan/update', 'KategoriKegiatanController@update')
                    ->name('kalender.kategori.update');
                    Route::get('/admin/kalender/kategori-kegiatan/edit/{id}', 'KategoriKegiatanController@edit');
                    Route::get('/admin/kalender/kategori-kegiatan/hapus/{id}', 'KategoriKegiatanController@destroy');
            });

            // Lembaga Desa
            Route::namespace('LembagaDesa')
            ->group(function () {
                Route::get('/admin/lembagadesa/lembagadesa', 'LembagaDesaController@index')
                ->name('lembagadesa.lembagadesa');
                Route::post('/admin/lembagadesa/lembagadesa', 'LembagaDesaController@store');
                Route::get('/admin/lembagadesa/lembagadesa/{id}', 'LembagaDesaController@edit');
                Route::get('/admin/lembagadesa/lembagadesa/view-lembaga/{id}', 'LembagaDesaController@view');
                Route::post('/admin/lembagadesa/lembagadesa/update', 'LembagaDesaController@update')
                    ->name('lembagadesa.lembagadesa-update');
                Route::post('/admin/lembagadesa/lembagadesa/penduduk', 'LembagaDesaController@addCitizen')
                    ->name('lembagadesa.lembagadesa-penduduk');
                Route::get('/admin/lembagadesa/lembagadesa/hapus/{id}', 'LembagaDesaController@destroy');

                //Jenis Lembaga
                Route::get('/admin/lembagadesa/jenislembaga', 'JenisLembagaController@index')
                ->name('lembagadesa.jenislembaga');
                Route::post('/admin/lembagadesa/jenislembaga', 'JenisLembagaController@store');
                Route::get('/admin/lembagadesa/jenislembaga/{id}', 'JenisLembagaController@edit');
                Route::post('/admin/lembagadesa/jenislembaga/update', 'JenisLembagaController@update')
                    ->name('lembagadesa.jenislembaga-update');
                Route::get('/admin/lembagadesa/jenislembaga/hapus/{id}', 'JenisLembagaController@destroy');
            });


        // Kampanye
        Route::namespace('Kampanye')
            ->group(function () {
                Route::get('/admin/kampanye/kampanye', 'CampaignController@index')
                ->name('kampanye.kampanye');
                Route::post('/admin/kampanye/kampanye', 'CampaignController@store');
                Route::get('/admin/kampanye/kampanye/{id}', 'CampaignController@edit');
                Route::post('/admin/kampanye/kampanye/update', 'CampaignController@update')
                    ->name('kampanye.kampanye-update');
                Route::get('/admin/kampanye/kampanye/hapus/{id}', 'CampaignController@destroy');
            });

        // Pengaduan
        Route::namespace('Pengaduan')
            ->group(function () {
            Route::get('/admin/pengaduan', 'PengaduanDesaController@index')
                 ->name('pengaduan.pengaduan');
            Route::get('/admin/pengaduan/hapus/{id}', 'PengaduanDesaController@destroy');
            });

        // Pengumuman
        Route::namespace('Pengumuman')
            ->group(function () {
            Route::get('/admin/pengumuman', 'PengumumanDesaController@index')
                ->name('pengumuman.pengumuman');
            Route::post('/admin/pengumuman/pesan/add', 'PengumumanDesaController@store')->name('pengumuman.pesan-add');
            Route::get('/admin/pengumuman/pesan/{id}', 'PengumumanDesaController@edit');
            Route::post('/admin/pengumuman/pesan/update', 'PengumumanDesaController@update')
                ->name('pengumuman.pesan-update');
            Route::get('/admin/pengumuman/pesan/hapus/{id}', 'PengumumanDesaController@destroy');
            });

        // Perpustakaan
        Route::namespace('Perpustakaan')
            ->group(function () {
            Route::get('/admin/perpustakaan', 'PerpustakaanController@index')
                ->name('perpustakaan.perpustakaan');
            });

        // Peristiwa
        Route::namespace('Peristiwa')
            ->group(function () {

                //Kelahiran
                Route::get('/admin/peristiwa/kelahiran', 'KelahiranController@index')
                    ->name('peristiwa.kelahiran');
                Route::post('/admin/peristiwa/kelahiran/add', 'KelahiranController@store')->name('kelahiran.add');
                Route::get('/admin/peristiwa/kelahiran/edit/{id}', 'KelahiranController@edit');
                Route::get('/admin/peristiwa/kelahiran/hapus/{id}', 'KelahiranController@destroy');
                Route::post('/admin/peristiwa/kelahiran/update', 'KelahiranController@update')->name('kelahiran.update');

                //Kematian
                Route::get('/admin/peristiwa/kematian', 'KematianController@index')
                    ->name('peristiwa.kematian');
                Route::post('/admin/peristiwa/kematian/add', 'KematianController@store')->name('kematian.add');
                Route::get('/admin/peristiwa/kematian/edit/{id}', 'KematianController@edit');
                Route::get('/admin/peristiwa/kematian/hapus/{id}', 'KematianController@destroy');
                Route::post('/admin/peristiwa/kematian/update', 'KematianController@update')->name('kematian.update');

                //Pindah
                Route::get('/admin/peristiwa/pindah', 'PindahController@index')
                    ->name('peristiwa.pindah');
                Route::post('/admin/peristiwa/pindah/add', 'PindahController@store')->name('pindah.add');
                Route::get('/admin/peristiwa/pindah/edit/{id}', 'PindahController@edit');
                Route::get('/admin/peristiwa/pindah/hapus/{id}', 'PindahController@destroy');
                Route::post('/admin/peristiwa/pindah/update', 'PindahController@update')->name('pindah.update');
            });

        // Potensi
        Route::namespace('Potensi')
            ->group(function () {
                Route::get('/admin/potensi/potensi', 'PotensiDesaController@index')
                    ->name('potensi.potensi');
                Route::get('/admin/potensi/hapus/{id}', 'PotensiDesaController@destroy');
                Route::post('/admin/potensi/potensi/update/{id}', 'PotensiDesaController@update');

                //Jenis Usaha
                Route::get('/admin/potensi/jenis-usaha', 'JenisUsahaController@index')
                    ->name('potensi.jenis-usaha');
                Route::post('/admin/potensi/jenis-usaha', 'JenisUsahaController@store');
                Route::post('/admin/potensi/jenis-usaha/update', 'JenisUsahaController@update')
                    ->name('potensi.jenis-usaha.update');
                Route::get('/admin/potensi/jenis-usaha/edit/{id}', 'JenisUsahaController@edit');
                Route::get('/admin/potensi/jenis-usaha/hapus/{id}', 'JenisUsahaController@destroy');


                //Kategori Usaha
                Route::get('/admin/potensi/kategori-usaha', 'KategoriUsahaController@index')
                ->name('potensi.kategori-usaha');
                Route::post('/admin/potensi/kategori-usaha', 'KategoriUsahaController@store');
                Route::post('/admin/potensi/kategori-usaha/update', 'KategoriUsahaController@update')
                ->name('potensi.category.update');
                Route::get('/admin/potensi/kategori-usaha/edit/{id}', 'KategoriUsahaController@edit');
                Route::get('/admin/potensi/kategori-usaha/hapus/{id}', 'KategoriUsahaController@destroy');
            });

        // Profil Desa
        Route::namespace('ProfilDesa')
            ->group(function () {
                Route::get('/admin/profil-desa', 'ProfilDesaController@index')
                    ->name('profil-desa.profil-desa');
                Route::post('/pegawai/profil-desa/updateProfile', 'ProfilDesaController@updateProfile')
                    ->name('profil-desa.profile-update');
                Route::post('/pegawai/profil-desa/addGallery', 'ProfilDesaController@addGallery')
                    ->name('profil-desa.add-gallery');
                Route::post('/pegawai/profil-desa/deleteGallery', 'ProfilDesaController@deleteGallery')
                    ->name('profil-desa.delete-gallery');
                Route::get('/admin/profil-desa/refreshGallery', 'ProfilDesaController@refreshGallery')
                    ->name('profil-desa.refresh-gallery');
            });

        // Referensi
        Route::namespace('Referensi')
            ->group(function () {
                // Route::get('/admin/referensi/bagian-pegawai', 'BagianPegawaiController@index')
                //     ->name('referensi.bagian-pegawai');
                // Route::get('/admin/referensi/status-pegawai', 'StatusPegawaiController@index')
                //     ->name('referensi.status-pegawai');
                // Route::get('/admin/referensi/golongan', 'GolonganController@index')
                //     ->name('referensi.golongan');
                Route::get('/admin/referensi/pengaturan-hak-akses', 'PengaturanHakAksesController@index')
                    ->name('referensi.pengaturan-hak-akses');
                Route::post('/admin/referensi/pengaturan-hak-akses-update', 'PengaturanHakAksesController@update')
                    ->name('referensi.pengaturan-hak-akses-update');
            });

        // Slider
        Route::namespace('Slider')
            ->group(function () {
                Route::get('/admin/slider/slider', 'SliderController@index')
                    ->name('slider.slider');
                Route::post('/admin/slider', 'SliderController@store')
                    ->name('slider.store');
                Route::get('/admin/slider/{id}', 'SliderController@edit')->name('slider.edit');
                Route::post('/admin/slider/update', 'SliderController@update')
                    ->name('slider.update');
                Route::get('/admin/slider/destroy/{id}', 'SliderController@destroy')
                    ->name('slider.destroy');
            });

        // Struktur
        Route::namespace('Struktur')
            ->group(function () {
                // Struktur Desa
                Route::get('/admin/struktur/struktur', 'StrukturDesaController@index')
                    ->name('struktur.struktur');
                Route::post('/admin/struktur/struktur', 'StrukturDesaController@store')
                    ->name('struktur.struktur.store');
                Route::get('/admin/struktur/struktur/{id}', 'StrukturDesaController@edit')
                    ->name('struktur.struktur.edit');
                Route::post('/admin/struktur/struktur/update', 'StrukturDesaController@update')
                    ->name('struktur.struktur.update');
                Route::get('/admin/struktur/struktur/hapus/{id}', 'StrukturDesaController@destroy')
                    ->name('struktur.struktur.delete');
                // route get some data for modals structures
                Route::get('/admin/struktur/get_employee', 'StrukturDesaController@getEmployee')
                    ->name('struktur.struktur.get_employee');
                Route::get('/admin/struktur/get_position', 'StrukturDesaController@getPosition')
                    ->name('struktur.struktur.get_position');
                Route::get('/admin/struktur/get_village_structure', 'StrukturDesaController@getVillageStructure')
                    ->name('struktur.struktur.get_village_structure');

                // Pegawai
                Route::get('/admin/struktur/pegawai', 'PegawaiController@index')
                    ->name('struktur.pegawai');
                Route::post('/admin/struktur/pegawai', 'PegawaiController@store')
                    ->name('struktur.pegawai.store');
                Route::get('/admin/struktur/pegawai/{id}', 'PegawaiController@edit')
                    ->name('struktur.pegawai.edit');
                Route::post('/admin/struktur/pegawai/update', 'PegawaiController@update')
                    ->name('struktur.pegawai.update');
                Route::get('/admin/struktur/pegawai/hapus/{id}', 'PegawaiController@destroy')
                    ->name('struktur.pegawai.delete');

                // Jabatan
                Route::get('/admin/struktur/jabatan', 'JabatanController@index')
                    ->name('struktur.jabatan');
                Route::post('/admin/struktur/jabatan', 'JabatanController@store')
                    ->name('struktur.jabatan.store');
                Route::get('/admin/struktur/jabatan/{id}', 'JabatanController@edit')
                    ->name('struktur.jabatan.edit');
                Route::post('/admin/struktur/jabatan/update', 'JabatanController@update')
                    ->name('struktur.jabatan.update');
                Route::get('/admin/struktur/jabatan/hapus/{id}', 'JabatanController@destroy')
                    ->name('struktur.jabatan.delete');

            });

        // Wisata Desa
        Route::namespace('WisataDesa')
            ->group(function () {
                Route::get('/admin/wisata-desa', 'VillageTourController@index')
                    ->name('wisata-desa.wisata-desa');
                Route::post('/admin/wisata-desa', 'VillageTourController@store');
                Route::get('/admin/wisata-desa/wisata-desa/{id}', 'VillageTourController@edit');
                Route::post('/admin/wisata-desa/wisata-desa/update', 'VillageTourController@update')
                    ->name('wisata-desa.wisata-desa-update');
                Route::get('/admin/wisata-desa/wisata-desa/hapus/{id}', 'VillageTourController@destroy');
            });
    });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
