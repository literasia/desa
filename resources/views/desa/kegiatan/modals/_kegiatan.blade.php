<div class="modal fade modal-flex" id="modal-kegiatan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="modal-title">
                    Tambah Kegiatan
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="form-kegiatan">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_kegiatan">Nama kegiatan</label>
                                <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                <input type="text" name="jenis_kegiatan" id="jenis_kegiatan" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="hari_kegiatan">Hari Kegiatan</label>
                                <input type="text" name="hari_kegiatan" id="hari_kegiatan" class="form-control form-control-sm" readonly>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                <input type="text" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control form-control-sm" readonly>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="jam_kegiatan">Jam Kegiatan</label>
                                <input type="text" name="jam_kegiatan" id="jam_kegiatan" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tempat">Tempat Kegiatan</label>
                                <textarea type="text" class="form-control" id="tempat" name="tempat" placeholder="Alamat" cols="10" rows="3"></textarea> 
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id">
                        <input type="hidden" id="action" val="add">
                        <input type="submit" class="btn btn-sm btn-success" value="Simpan" id="btn">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>