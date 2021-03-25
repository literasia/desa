<div class="modal fade modal-flex" id="modal-kegiatan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="modal-title">
                    Tambah Pemilihan
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="form-kampanye">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_calon">Nama Calon</label>
                                <input type="text" name="nama_calon" id="nama_calon" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="nama_calon_wakil">Nama Calon Wakil</label>
                                <input type="text" name="nama_calon_wakil" id="nama_calon_wakil" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="visi">Visi</label>
                                <textarea type="text" class="form-control" id="visi" name="visi" placeholder="Alamat" cols="10" rows="3"></textarea> 
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="misi">Misi</label>
                                <textarea type="text" class="form-control" id="misi" name="misi" placeholder="Alamat" cols="10" rows="3"></textarea> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="upload">Foto</label>
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