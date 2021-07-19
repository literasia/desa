<div class="modal fade modal-flex" id="modal-desa" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Desa
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-desa" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="village_list">Nama Desa</label>
                                <select name="village_id" id="village_list" class="form-control form-control-sm">
                                    <option value="">-- Pilih Desa --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="form-group" id="username_group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="password" id="label_password">Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="password_confirmation" id="label_password2">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="add_ons">Add-ons</label>
                                <div class="row mx-1 text-center">
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-dashboard" checked class="d-block checkbox" >
                                        <span><i class="fa fa-home add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Dasboard</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-population_data" checked class="d-block checkbox">
                                        <span><i class="fa fa-users add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Data Penduduk</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-village_structure" checked class="d-block checkbox">
                                        <span><i class="fa fa-project-diagram add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Struktur Desa</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-village_profile" checked class="d-block checkbox">
                                        <span><i class="fa fa-id-badge add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Profil Desa</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-administration" checked class="d-block checkbox">

                                        <span><i class="fa fa-archive add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Administrasi</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-village_potency" checked class="d-block checkbox">

                                        <span><i class="fa fa-chart-line add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Potensi Desa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="add_ons"></label>
                                <div class="row mx-1 text-center">
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-news" checked class="d-block checkbox">
                                        <span><i class="fa fa-newspaper add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Berita</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-slider" checked class="d-block checkbox">
                                        <span><i class="fa fa-images add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Slider</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-attendance" checked class="d-block checkbox">
                                        <span><i class="fa fa-clipboard-list add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Absensi</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-event" checked class="d-block checkbox">
                                        <span><i class="fa fa-chart-bar add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Peristiwa</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-village_tour" checked class="d-block checkbox">
                                        <span><i class="fa fa-map-marker-alt add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Wisata Desa</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-calendar" checked class="d-block checkbox">

                                        <span><i class="fa fa-calendar add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Kalender</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="add_ons"></label>
                                <div class="row mx-1 text-center">
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-announcement" checked class="d-block checkbox">
                                        <span><i class="fa fa-bell add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Pengumuman</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-campaign" checked class="d-block checkbox">
                                        <span><i class="fa fa-bullhorn add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Kampanye</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-reference" checked class="d-block checkbox">
                                        <span><i class="fa fa-list-alt add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Referensi</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-library" checked class="d-block checkbox">
                                        <span><i class="fa fa-book-open add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Perpustakaan</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-complaint" checked class="d-block checkbox">

                                        <span><i class="fa fa-comment-alt add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Pengaduan</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-greeting" checked class="d-block checkbox">
                                        <span><i class="fa fa-bell add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Sambutan Kepala Desa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="add_ons"></label>
                                <div class="row mx-1 text-center">
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-social_assistance" checked class="d-block checkbox">
                                        <span><i class="fa fa-hands-helping add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Bantuan Sosial</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-community" checked class="d-block checkbox">
                                        <span><i class="fa fa-university add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Lembaga Desa</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-awareness" checked class="d-block checkbox">
                                        <span><i class="fa fa-gavel add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Sadar Hukum</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-development" checked class="d-block checkbox">

                                        <span><i class="fa fa-database add-ons-icon mb-2"></i></span>
                                        <p class="m-0">Program Desa</p>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 my-2 p-2 card rounded">
                                        <input type="checkbox" name="x-addon-bumdes" checked class="d-block checkbox">

                                        <span><i class="fa fa-warehouse add-ons-icon mb-2"></i></span>
                                        <p class="m-0">BUMDes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="hidden" name="hidden_id" id="hidden_id">
                                <input type="hidden" id="action">
                                <button type="submit" id="btn" class="btn btn-sm btn-success">Simpan</button>
                                <button type="button" id="rest" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
