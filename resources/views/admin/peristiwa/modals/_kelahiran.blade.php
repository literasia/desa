<div class="modal fade modal-flex" id="modal-kelahiran" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Kelahiran
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_kelahiran" action="">
                @csrf
                    <div class="row">
                    <input type="hidden" name="hidden_id" id="hidden_id" class="form-control form-control-sm">
                        <div class="col">
                            <div class="form-group">
                                <label for="no_kk">Nomor Kartu Keluarga</label>
                                <input type="text" name="no_kk" id="no_kk" class="form-control form-control-sm" placeholder="Nomor Kartu Keluarga">
                            </div>
                        </div>  
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nama Bayi</label>
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="address">Alamat Tinggal</label>
                                <textarea name="address" id="address" cols="10" rows="3" class="form-control form-control-sm" placeholder="Alamat Tinggal"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="dadname">Nama Ayah</label>
                                <input type="text" name="dadname" id="dadname" class="form-control form-control-sm" placeholder="Nama Ayah">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="momname">Nama Ibu</label>
                                <input type="text" name="momname" id="momname" class="form-control form-control-sm" placeholder="Nama Ibu">
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