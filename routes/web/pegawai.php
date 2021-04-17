<?php

        // Administrasi
// Route::namespace('Administrasi')
//     ->group(function () {
//         Route::get('/pegawai/administrasi/permohonan-pembuatan-ktp', 'PermohonanKTPContfoller@index')
//             ->name('administrasi.permohonan_pembuatan_ktp');
//         Route::get('/pegawai/administrasi/surat-keterangan-lahir', 'SuratKeteranganLahirController@index')
//             ->name('administrasi.surat_keterangan_lahir');

//         Route::get('/pegawai/administrasi/perubahan-kk', 'PerubahanKKController@index')
//             ->name('administrasi.perubahan-kk');
//         Route::get('/pegawai/administrasi/perubahan-kk/{id}', 'PerubahanKKController@edit');
//         Route::post('/pegawai/administrasi/perubahan-kk/update', 'PerubahanKKController@update')
//             ->name('administrasi.perubahan-kk.update');
//         Route::get('/pegawai/administrasi/perubahan-kk/hapus/{id}', 'PerubahanKKController@destroy');

//         //Surat Kematian
//         Route::get('/pegawai/administrasi/surat-kematian', 'SuratKematianController@index')
//             ->name('administrasi.surat-kematian');
//         Route::get('/pegawai/administrasi/surat-kematian/{id}', 'SuratKematianController@edit');
//         Route::post('/pegawai/administrasi/surat-kematian/update', 'SuratKematianController@update')
//             ->name('administrasi.surat-kematian.update');
//         Route::get('/pegawai/administrasi/surat-kematian/hapus/{id}', 'SuratKematianController@destroy');

//         Route::get('/pegawai/administrasi/izin-usaha', 'IzinUsahaController@index')
//             ->name('administrasi.izin_usaha');
//         Route::get('/pegawai/administrasi/keterangan-tidak-mampu', 'KeteranganTidakMampuController@index')
//             ->name('administrasi.keterangan_tidak_mampu');

//         //SKCK
//         Route::get('/pegawai/administrasi/permohonan-skck', 'PermohonanSKCKController@index')
//             ->name('administrasi.permohonan-skck');
//         Route::get('/pegawai/administrasi/permohonan-skck/{id}', 'PermohonanSKCKController@edit');
//         Route::post('/pegawai/administrasi/permohonan-skck/update', 'PermohonanSKCKController@update')
//             ->name('administrasi.permohonan-skck-update');
//         Route::get('/pegawai/administrasi/permohonan-skck/hapus/{id}', 'PermohonanSKCKController@destroy');

//         Route::get('/pegawai/administrasi/keterangan-pindah', 'KeteranganPindahController@index')
//             ->name('administrasi.keterangan-pindah');

//         // Domisili
//         Route::get('/pegawai/administrasi/keterangan-domisili', 'KeteranganDomisiliController@index')
//             ->name('administrasi.keterangan-domisili');
//         Route::get('/pegawai/administrasi/keterangan-domisili/{id}', 'KeteranganDomisiliController@edit');
//         Route::post('/pegawai/administrasi/keterangan-domisili/update', 'KeteranganDomisiliController@update')
//             ->name('administrasi.keterangan-domisili-update');
//         Route::get('/pegawai/administrasi/keterangan-domisili/hapus/{id}', 'KeteranganDomisiliController@destroy');

//         // Ahli Waris
//         Route::get('/pegawai/administrasi/keterangan-ahli-waris', 'KeteranganAhliWarisController@index')
//             ->name('administrasi.keterangan-ahli-waris');
//         Route::get('/pegawai/administrasi/keterangan-ahli-waris/{id}', 'KeteranganAhliWarisController@edit');
//         Route::post('/pegawai/administrasi/keterangan-ahli-waris/update', 'KeteranganAhliWarisController@update')
//             ->name('administrasi.keterangan-ahli-waris-update');
//         Route::get('/pegawai/administrasi/keterangan-ahli-waris/hapus/{id}', 'KeteranganAhliWarisController@destroy');


//         Route::get('/pegawai/administrasi/keterangan-tanah', 'KeteranganTanahController@index')
//             ->name('administrasi.keterangan-tanah');
//     });

// // Berita
// Route::namespace('Berita')
//     ->group(function () {

//         // Berita
//         Route::get('/pegawai/berita/berita', 'NewsController@index')
//         ->name('berita.berita');
//         Route::post('/pegawai/berita/berita', 'NewsController@store');
//         Route::get('/pegawai/berita/berita/{id}', 'NewsController@edit');
//         Route::post('/pegawai/berita/berita/update', 'NewsController@update')
//             ->name('berita.berita-update');
//         Route::get('/pegawai/berita/berita/hapus/{id}', 'NewsController@destroy');

//         // Kategori Berita
//         Route::get('/pegawai/berita/kategori-berita', 'NewsCategoryController@index')
//             ->name('berita.kategori-berita');
//         Route::post('/pegawai/berita/kategori-berita', 'NewsCategoryController@store');
//         Route::get('/pegawai/berita/kategori-berita/{id}', 'NewsCategoryController@edit');
//         Route::post('/pegawai/berita/kategori-berita/update', 'NewsCategoryController@update')
//             ->name('berita.kategori-berita-update');
//         Route::get('/pegawai/berita/kategori-berita/hapus/{id}', 'NewsCategoryController@destroy');
//     });


// // Kalender
// Route::namespace('Kalender')
//     ->group(function () {


// // Kampanye
// Route::namespace('Kampanye')
//     ->group(function () {
//         Route::get('/pegawai/kampanye/kampanye', 'CampaignController@index')
//         ->name('kampanye.kampanye');
//         Route::post('/pegawai/kampanye/kampanye', 'CampaignController@store');
//         Route::get('/pegawai/kampanye/kampanye/{id}', 'CampaignController@edit');
//         Route::post('/pegawai/kampanye/kampanye/update', 'CampaignController@update')
//             ->name('kampanye.kampanye-update');
//         Route::get('/pegawai/kampanye/kampanye/hapus/{id}', 'CampaignController@destroy');
//     });




// Route::namespace('Peristiwa')
//     ->group(function () {
//         Route::get('/pegawai/peristiwa/kelahiran', 'KelahiranController@index')
//             ->name('peristiwa.kelahiran');
//         Route::get('/pegawai/peristiwa/kematian', 'KematianController@index')
//             ->name('peristiwa.kematian');
//         Route::get('/pegawai/peristiwa/pindah', 'PindahController@index')
//             ->name('peristiwa.pindah');
//     });

// // Potensi
// Route::namespace('Potensi')
//     ->group(function () {
//         Route::get('/pegawai/potensi/potensi', 'PotensiDesaController@index')
//             ->name('potensi.potensi');
//         Route::get('/pegawai/potensi/hapus/{id}', 'PotensiDesaController@destroy');
//         Route::post('/pegawai/potensi/potensi/update/{id}', 'PotensiDesaController@update');

//         //Jenis Usaha
//         Route::get('/pegawai/potensi/jenis-usaha', 'JenisUsahaController@index')
//             ->name('potensi.jenis-usaha');
//         Route::post('/pegawai/potensi/jenis-usaha', 'JenisUsahaController@store');
//         Route::post('/pegawai/potensi/jenis-usaha/update', 'JenisUsahaController@update')
//             ->name('potensi.jenis-usaha.update');
//         Route::get('/pegawai/potensi/jenis-usaha/edit/{id}', 'JenisUsahaController@edit');
//         Route::get('/pegawai/potensi/jenis-usaha/hapus/{id}', 'JenisUsahaController@destroy');


//         //Kategori Usaha
//         Route::get('/pegawai/potensi/kategori-usaha', 'KategoriUsahaController@index')
//         ->name('potensi.kategori-usaha');
//         Route::post('/pegawai/potensi/kategori-usaha', 'KategoriUsahaController@store');
//         Route::post('/pegawai/potensi/kategori-usaha/update', 'KategoriUsahaController@update')
//         ->name('potensi.category.update');
//         Route::get('/pegawai/potensi/kategori-usaha/edit/{id}', 'KategoriUsahaController@edit');
//         Route::get('/pegawai/potensi/kategori-usaha/hapus/{id}', 'KategoriUsahaController@destroy');
//     });

// // Profil
// Route::namespace('ProfilDesa')
//     ->group(function () {
//         Route::get('/pegawai/profil-desa', 'ProfilDesaController@index')
//             ->name('profil-desa.profil-desa');
//     });

// // Referensi
// Route::namespace('Referensi')
//     ->group(function () {
//         Route::get('/pegawai/referensi/bagian-pegawai', 'BagianPegawaiController@index')
//             ->name('referensi.bagian-pegawai');
//         Route::get('/pegawai/referensi/status-pegawai', 'StatusPegawaiController@index')
//             ->name('referensi.status-pegawai');
//         Route::get('/pegawai/referensi/golongan', 'GolonganController@index')
//             ->name('referensi.golongan');
//         Route::get('/pegawai/referensi/pengaturan-hak-akses', 'PengaturanHakAksesController@index')
//             ->name('referensi.pengaturan-hak-akses');
//         Route::post('/pegawai/referensi/pengaturan-hak-akses-update', 'PengaturanHakAksesController@update')
//             ->name('referensi.pengaturan-hak-akses-update');
//     });

// // Slider
// Route::namespace('Slider')
//     ->group(function () {
//         Route::get('/pegawai/slider/slider', 'SliderController@index')
//             ->name('slider.slider');
//         Route::post('/pegawai/slider', 'SliderController@store')
//             ->name('slider.store');
//         Route::get('/pegawai/slider/{id}', 'SliderController@edit')->name('slider.edit');
//         Route::post('/pegawai/slider/update', 'SliderController@update')
//             ->name('slider.update');
//         Route::get('/pegawai/slider/destroy/{id}', 'SliderController@destroy')
//             ->name('slider.destroy');
//     });

// // Wisata Desa
// Route::namespace('WisataDesa')
//     ->group(function () {
//         Route::get('/pegawai/wisata-desa', 'VillageTourController@index')
//             ->name('wisata-desa.wisata-desa');
//         Route::post('/pegawai/wisata-desa', 'VillageTourController@store');
//         Route::get('/pegawai/wisata-desa/wisata-desa/{id}', 'VillageTourController@edit');
//         Route::post('/pegawai/wisata-desa/wisata-desa/update', 'VillageTourController@update')
//             ->name('wisata-desa.wisata-desa-update');
//         Route::get('/pegawai/wisata-desa/wisata-desa/hapus/{id}', 'VillageTourController@destroy');
//     });
