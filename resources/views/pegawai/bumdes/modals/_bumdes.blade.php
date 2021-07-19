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
                <form id="form-bumdes" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="bumdes_name">Nama BUMDes</label>
                                <input type="text" name="bumdes_name" id="bumdes_name" class="form-control form-control-sm" placeholder="Nama BUMDes">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="description">Keterangan</label>
                                <textarea name="description" id="description" cols="10" rows="3" class="form-control form-control-sm" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label for="citizen">Pengelola*</label>
                            <input type="text" name="citizen" id="citizen" class="form-control form-control-sm" value="{{$name}}" readonly>

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="registration_code">Kode Registrasi</label>
                                <input type="text" name="registration_code" id="registration_code" class="form-control form-control-sm" placeholder="Kode Registrasi">
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
                                <label for="no_whatsapp">No. WhatsApp*</label>
                                <input type="number" name="no_whatsapp" id="no_whatsapp" class="form-control form-control-sm" placeholder="No. WhatsApp">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="bumdes_email">Email</label>
                                <input type="email" name="bumdes_email" id="bumdes_email" class="form-control form-control-sm" placeholder="Email">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="bumdes_address">Alamat*</label>
                                <input type="text" name="bumdes_address" id="bumdes_address" class="form-control form-control-sm" placeholder="Alamat">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="since_year">Tahun Berdiri</label>
                                <input type="number" name="since_year" id="since_year" class="form-control form-control-sm" placeholder="Tahun Berdiri">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="number_of_employee">Jumlah Pegawai*</label>
                                <input type="number" name="number_of_employee" id="number_of_employee" class="form-control form-control-sm" placeholder="Jumlah Pegawai">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="adrt">ADRT</label>
                                <input type="number" name="adrt" id="adrt" class="form-control form-control-sm" placeholder="ADRT">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="financial_report">Laporan Keuangan Akhir Tahun</label>
                                <input type="file" id="financial_report" name="financial_report" />                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="earnings_last_year">Omzet Tahun Lalu</label>
                                <input type="number" name="earnings_last_year" id="earnings_last_year" class="form-control form-control-sm" placeholder="Omzet Tahun Lalu">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="profits_last_year">Keuntungan Tahun Lalu</label>
                                <input type="number" name="profits_last_year" id="profits_last_year" class="form-control form-control-sm" placeholder="Keuntungan Tahun Lalu">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                Upload Foto :                                
                                <label for="bumdes_image" class="mt-1">
                                    thumbnail:
                                    <small class="text-muted">max. 3MB</small>
                                </label>
                                <div id="userActions">
                                    <p>Drag &amp; Drop Image</p>
                                    <input type="file" id="fileUpload" name="bumdes_image" accept="image/*"/>
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