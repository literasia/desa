<div class="modal fade modal-flex" id="modal-wisata" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="modal-title">
                    Wisata Desa
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="form-wisata">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_tempat">Nama Tempat</label>
                                <input type="text" name="nama_tempat" id="nama_tempat" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="hari_buka">Hari Buka</label>
                                <select name="hari_buka" id="hari_buka" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jum'at</option>
                                    <option value="sabtu">Sabtu</option>
                                    <option value="minggu">Minggu</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="jam_buka">Jam Buka</label>
                                <input type="text" name="jam_buka" id="jam_buka" class="form-control form-control-sm clockpicker" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="jam_tutup">Jam Tutup</label>
                                <input type="text" name="jam_tutup" id="jam_tutup" class="form-control form-control-sm clockpicker" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="jenis_wisata">Jenis Wisata</label>
                                <select name="jenis_wisata" id="jenis_wisata" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    <option value="kuliner">Kuliner</option>
                                    <option value="alam">Alam</option>
                                    <option value="budaya">Budaya</option>
                                    <option value="pertanian">Pertanian</option>
                                    <option value="bahari">Bahari</option>
                                    <option value="sejarah">Sejarah</option>
                                    <option value="religi">Religi</option>
                                    <option value="buru">Buru</option>
                                    <option value="pendidikan">Pendidikan</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="no_telp">No. Telepon</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control form-control-sm">
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