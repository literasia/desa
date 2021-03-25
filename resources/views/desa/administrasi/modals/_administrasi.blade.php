<div class="modal fade modal-flex" id="modal-administrasi" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="modal-title">
                    Administrasi Desa
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="form-pemilihan">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control form-control-sm">
                                </input>
                            </div>
                        </div>
                                            
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan">No.Ktp</label>
                                <input name="keterangan" id="keterangan" class="form-control form-control-sm"></input>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="posisi">No.Telephone</label>
                                <input name="posisi" id="posisi" class="form-control form-control-sm">
                                </input>
                            </div>
                        </div>                       
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="upload">Upload KTP</label>
                                <input type="file" name="foto" id="foto" accept="image/*" value="" autocomplete="off">
                                <label for="foto" class="mt-1">
                                    Foto:
                                    <small class="text-muted">max. 3MB</small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id">
                        <input type="hidden" id="action" val="add">
                        <input type="submit" class="btn btn-sm btn-outline-success" value="Simpan" id="btn">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>