<?php

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('admin')
    ->name('admin.')
    ->middleware(['auth', 'auth.admin'])
    ->group(function () {
        Route::get('/admin', 'AdminController@index')
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

         // Kalender
         Route::namespace('Kalender')
         ->group(function () {
         Route::get('/superadmin/kalender', 'KalenderSuperadminController@index')
             ->name('kalender.kalender');
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
                Route::get('/superadmin/referensi/suku/hapus/{id}', 'SukuController@destroy');
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
// Pegawai route
Route::namespace("Pegawai")
    ->name("pegawai.")
    ->middleware(['auth','auth.pegawai'])
    ->group(function(){
        Route::get('/pegawai', 'PegawaiController@index')
            ->name('index');

        // Kalender
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

        // wisata desa
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

        // Profil
        Route::namespace('ProfilDesa')
            ->group(function () {
                Route::get('/pegawai/profil-desa', 'ProfilDesaController@index')
                    ->name('profil-desa.profil-desa');
            });

        // Data Penduduk
        Route::namespace('DataPenduduk')
            ->group(function () {
                Route::get('/pegawai/data-penduduk/keluarga', 'KeluargaController@index')
                    ->name('data-penduduk.keluarga');
                Route::get('/pegawai/data-penduduk/penduduk', 'PendudukController@index')
                    ->name('data-penduduk.penduduk');
                Route::get('/pegawai/data-penduduk/input-data-penduduk', 'InputDataPendudukController@index')
                    ->name('data-penduduk.penduduk.input-data-penduduk');
            });


        // Pengumuman
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

        // Pengaduan
        Route::namespace('Pengaduan')
            ->group(function () {
            Route::get('/pegawai/pengaduan', 'PengaduanDesaController@index')
                    ->name('pengaduan.pengaduan');
            Route::get('/pegawai/pengaduan/hapus/{id}', 'PengaduanDesaController@destroy');
            });

    });

Route::namespace('Admin')
    ->name('admin.')
    ->middleware(['auth', 'auth.admin'])
    ->group(function () {
        Route::get('/admin', 'AdminController@index')
            ->name('index');

        // Administrasi
        Route::namespace('Administrasi')
            ->group(function () {
                Route::get('admin/administrasi/permohonan-pembuatan-ktp', 'PermohonanKTPController@index')
                    ->name('administrasi.permohonan_pembuatan_ktp');
                Route::get('/admin/administrasi/surat-keterangan-lahir', 'SuratKeteranganLahirController@index')
                    ->name('administrasi.surat_keterangan_lahir');

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

                Route::get('/admin/administrasi/izin-usaha', 'IzinUsahaController@index')
                    ->name('administrasi.izin_usaha');
                Route::get('/admin/administrasi/keterangan-tidak-mampu', 'KeteranganTidakMampuController@index')
                    ->name('administrasi.keterangan_tidak_mampu');

                //SKCK
                Route::get('/admin/administrasi/permohonan-skck', 'PermohonanSKCKController@index')
                    ->name('administrasi.permohonan-skck');
                Route::get('/admin/administrasi/permohonan-skck/{id}', 'PermohonanSKCKController@edit');
                Route::post('/admin/administrasi/permohonan-skck/update', 'PermohonanSKCKController@update')
                    ->name('administrasi.permohonan-skck-update');
                Route::get('/admin/administrasi/permohonan-skck/hapus/{id}', 'PermohonanSKCKController@destroy');

                Route::get('/admin/administrasi/keterangan-pindah', 'KeteranganPindahController@index')
                    ->name('administrasi.keterangan-pindah');

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
