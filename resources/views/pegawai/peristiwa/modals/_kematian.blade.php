<div class="modal fade modal-flex" id="modal-kematian" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Penduduk meninggal
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_kematian" action="">
            @csrf
            <div class="modal-body">    
                <div class="row">
                <input type="hidden" name="hidden_id" id="hidden_id" class="form-control form-control-sm">
                <div class="col">
                    <div class="form-group">
                        <label for="no.kk">No. KK</label>
                        <input type="text" name="no_kk" id="no_kk" class="form-control form-control-sm" placeholder="No. KK">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="NIK"><Nav>NIK</Nav></label>
                        <input type="text" name="nik" id="nik" class="form-control form-control-sm" placeholder="NIK">
                    </div>
                </div>
             </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Nama Lengkap">
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="birthplace">Tempat Lahir</label>
                                <input type="text" name="birthplace" id="birthplace" class="form-control form-control-sm" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="birthdate">Tanggal Lahir</label>
                                <input type="text" name="birthdate" id="birthdate" class="form-control form-control-sm" placeholder="Tanggal Lahir" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="deathdate">Tanggal Kematian</label>
                                <input type="text" name="deathdate" id="deathdate" class="form-control form-control-sm" placeholder="Tanggal Lahir" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="deadcause">Sebab Kematian</label>
                                <input type="text" name="deadcause" id="deadcause" class="form-control form-control-sm" placeholder="Penyebab Kematian">
                            </div>
                        </div>  
                    </div>                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control form-control-sm">
                                    <option value="">-- Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="religion">Agama</label>
                                <select name="religion" id="religion" class="form-control form-control-sm">
                                    <option value="">-- Agama --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Konghuchu">Konghuchu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="status_marriage">Status Menikah</label>
                                <select name="status_marriage" id="status_marriage" class="form-control form-control-sm">
                                    <option value="">-- Status Menikah --</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="address">Alamat Tinggal</label>
                                <textarea name="address" id="address" cols="10" rows="3" class="form-control form-control-sm" placeholder="Alamat Tinggal"></textarea>
                            </div>
                        </div>
                    </div>                              
            </div>
            <div class="modal-footer">
                <button type="submit" id="button" class="btn btn-sm btn-success">Simpan</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>