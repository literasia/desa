<div class="modal fade modal-flex" id="modal-potensi" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="modal-title">
                    Tambah Potensi Desa
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="form-pemilihan">
                <div class="row">
                    <div class="col">
                            <div class="form-group">
                                <label for="posisi">Kategori</label>
                                <select name="posisi" id="posisi" class="form-control form-control-sm">
                                    <option value="">Pilih</option>                                   
                                </select>
                            </div>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Nama Usaha</label>
                                <input type="text" name="nama" id="nama" class="form-control form-control-sm">                            
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="pemilik">Pemilik Usaha</label>
                                <input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="alamat">Alamat Usaha</label>
                                <input type="text" name="alamat" id="alamat" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="no_hp">No. Telephone</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="harga_produk">Harga Produk</label>
                                <input type="text" name="harga_produk" id="harga_produk" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tgl_input">Tanggal Input</label>
                                <input type="" name="tgl_input" id="tgl_input" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="10" rows="3" class="form-control form-control-sm" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
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