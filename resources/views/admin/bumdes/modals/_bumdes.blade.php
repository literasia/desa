<div class="modal fade modal-flex" id="modal-bumdes" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="modal-title">
                    Tambah BUMDes
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="form-tour">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nama BUMDes</label>
                                <input type="text" name="name" id="name_bumdes" class="form-control form-control-sm" placeholder="Nama BUMDes">
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
                        <div class="col">
                            <div class="form-group">
                            <label for="pengelola">Pengelola*</label>
                                <select name="pengelola" id="pengelola" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="kode_registrasi">Kode Registrasi</label>
                                <input type="text" name="kode_registrasi" id="kode_registrasi" class="form-control form-control-sm" placeholder="Kode Registrasi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status" id="status" class="form-control form-control-sm" placeholder="Status">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="no_wa">No. WhatsApp*</label>
                                <input type="text" name="no_wa" id="no_wa" class="form-control form-control-sm" placeholder="No. WhatsApp">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control form-control-sm" placeholder="Email">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="alamat">Alamat*</label>
                                <input type="text" name="alamat" id="alamat" class="form-control form-control-sm" placeholder="Alamat">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tahun_berdiri">Tahun Berdiri</label>
                                <input type="text" name="tahun_berdiri" id="tahun_berdiri" class="form-control form-control-sm" placeholder="Tahun Berdiri">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="jumlah_pegawai">Jumlah Pegawai*</label>
                                <input type="text" name="jumlah_pegawai" id="jumlah_pegawai" class="form-control form-control-sm" placeholder="Jumlah Pegawai">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="adrt">ADRT</label>
                                <input type="text" name="adrt" id="adrt" class="form-control form-control-sm" placeholder="ADRT">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="laporan_keuangan">Laporan Keuangan Akhir Tahun</label>
                                <input type="text" name="laporan_keuangan" id="laporan_keuangan" class="form-control form-control-sm" placeholder="Laporan Keuangan Akhir Tahun">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="omzet">Omzet Tahun Lalu</label>
                                <input type="text" name="omzet" id="omzet" class="form-control form-control-sm" placeholder="Omzet Tahun Lalu">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="keuntungan">Keuntungan Tahun Lalu</label>
                                <input type="text" name="keuntungan" id="keuntungan" class="form-control form-control-sm" placeholder="Keuntungan Tahun Lalu">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                Upload Foto :                                
                                <label for="image" class="mt-1">
                                    thumbnail:
                                    <small class="text-muted">max. 10MB</small>
                                </label>
                                <div id="userActions">
                                    <p>Drag &amp; Drop Image</p>
                                    <input type="file" id="fileUpload" />
                                </div>
                                <img id="imgPrime" src="" alt="uploaded image placeholder" />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id">
                        <input type="hidden" id="action" value="add">
                        <input type="submit" class="btn btn-sm btn-success" value="Simpan" id="btn">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.error{ color: #B71C1C; }
#userActions{
	display: table-cell;
	height: 150px;
	width: 200px;
	vertical-align: middle;
	text-align: center;
	color: #37474F;
	background-color: #FFFFFF;
	border: solid 2px #333333;
	border-radius: 10px;
}
#userActions input{
	width: 150px;
	margin: auto;
}
#imgPrime{ display: none; }
</style>