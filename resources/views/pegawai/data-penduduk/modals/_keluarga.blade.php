 <div class="modal fade modal-flex" id="modal-keluarga" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="modal-title">
                    Tambah Data Keluarga
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="form-keluarga">
                    <div class="form-group row px-3">
                        <label for="no_kk">No. KK</label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No. KK">
                    </div>

                    <div class="form-group row px-3">
                        <label for="nama_kepala_keluarga">Kepala Keluarga</label>
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" placeholder="Nama Kepala Keluarga" aria-label="Nama Kepala Keluarga" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button id="add" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Detail data kepala keluarga : Mulai -->
                    <div class="card bg-light p-3 collapse" id="collapse1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input type="text" class="form-control" id="kewarganegaraan" placeholder="Kewarganegaraan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="email" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_guru">Jenis Kelamin</label>
                                    <select name="status_guru" id="status_guru" class="form-control form-control-sm">
                                        <option value="">-- Jenis Kelamin --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" id="agama" class="form-control form-control-sm">
                                        <option value="">-- Agama --</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                    <input type="text" class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="Jenis Pekerjaan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_dalam_keluarga">Status Hubungan Dalam Keluarga</label>
                                    <input type="text" class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" placeholder="Status Hubungan Dalam Keluarga">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- Detail data kepala keluarga : Selesai -->
                   <div class="form-group row px-3">
                        <label for="nama_istri">Istri</label>
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" id="nama_istri" name="nama_istri" placeholder="Nama Istri" aria-label="Nama Istri" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button id="add" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Detail data istri : Mulai -->
                    <div class="card bg-light p-3 collapse" id="collapse2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input type="text" class="form-control" id="kewarganegaraan" placeholder="Kewarganegaraan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="email" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_guru">Jenis Kelamin</label>
                                    <select name="status_guru" id="status_guru" class="form-control form-control-sm">
                                        <option value="">-- Jenis Kelamin --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" id="agama" class="form-control form-control-sm">
                                        <option value="">-- Agama --</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                    <input type="text" class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="Jenis Pekerjaan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_dalam_keluarga">Status Hubungan Dalam Keluarga</label>
                                    <input type="text" class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" placeholder="Status Hubungan Dalam Keluarga">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Detail data istri : Selesai -->
                    <div class="form-group row px-3">
                        <label for="nama_anak">Anak</label>
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" id="nama_anak" name="nama_anak" placeholder="Nama Anak" aria-label="Nama Anak" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button id="add" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAdded_1" aria-expanded="false" aria-controls="collapseAdded_1"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Detail data anak : Mulai -->
                    <div class="card bg-light p-3 collapse" id="collapseAdded_1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input type="text" class="form-control" id="kewarganegaraan" placeholder="Kewarganegaraan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="email" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_guru">Jenis Kelamin</label>
                                    <select name="status_guru" id="status_guru" class="form-control form-control-sm">
                                        <option value="">-- Jenis Kelamin --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" id="agama" class="form-control form-control-sm">
                                        <option value="">-- Agama --</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                    <input type="text" class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="Jenis Pekerjaan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_dalam_keluarga">Status Hubungan Dalam Keluarga</label>
                                    <input type="text" class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" placeholder="Status Hubungan Dalam Keluarga">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Detail data anak : Selesai -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" cols="10" rows="3"></textarea> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rt_rw">RT/RW</label>
                                <input type="text" class="form-control" id="rt_rw" name="rt_rw" placeholder="RT/RW">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="desa">Desa/Kelurahan</label>
                                <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa/Kelurahan">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
                            </div>
                        </div>
                    </div>
                </form>
            <div class="modal-footer pb-0">
                <button type="submit" id="btn-submit" class="btn btn-sm btn-success">Simpan</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
    