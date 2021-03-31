<div class="modal fade modal-flex" id="modal-kelahiran" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Kelahiran
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_pegawai">Nama Bayi</label>
                                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control form-control-sm" placeholder="Nama Lengkap">
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control form-control-sm" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm" placeholder="Tanggal Lahir" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-sm">
                                    <option value="">-- Jenis Kelamin --</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama" class="form-control form-control-sm">
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
                                <label for="alamat_tinggal">Alamat Tinggal</label>
                                <textarea name="alamat_tinggal" id="alamat_tinggal" cols="10" rows="3" class="form-control form-control-sm" placeholder="Alamat Tinggal"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_pegawai">Nama Ayah</label>
                                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control form-control-sm" placeholder="Nama Lengkap">
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_pegawai">Nama Ibu</label>
                                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control form-control-sm" placeholder="Nama Lengkap">
                            </div>
                        </div>  
                    </div>                                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-outline-success">Simpan</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>