<div class="modal fade modal-flex" id="modal-jenis-bantuan-sosial" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Jenis Bantuan Sosial
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-jenis-bantuan-sosial" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Menggunakan Nomor Identitas</label>
                                <select name="identity_number_status" class="form-control form-control-sm" id="identity_number_status">
                                    <option value="">-Silahkan Pilih-</option>
                                    <option value="1">Ya</option>
                                    <option value="2">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="number_of_stages">Jumlah Tahapan</label>
                                <input type="number" id="number_of_stages" name="number_of_stages" class="form-control form-control-sm" placeholder="Jumlah Tahapan" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="total">Total Bantuan</label>
                                <input type="number" id="total" name="total" class="form-control form-control-sm" placeholder=""/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="month">Bulan</label>
                                <input type="number" id="month" name="month" class="form-control form-control-sm" placeholder=""/>
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