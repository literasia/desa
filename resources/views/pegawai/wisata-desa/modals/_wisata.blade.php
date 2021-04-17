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
                <form id="form-tour">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nama Tempat</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Nama Tempat">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Alamat">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="day_open">Hari Buka</label>
                                <select name="day_open" id="day_open" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    <option value="monday">Senin</option>
                                    <option value="tuesday">Selasa</option>
                                    <option value="wednesday">Rabu</option>
                                    <option value="thursday">Kamis</option>
                                    <option value="friday">Jum'at</option>
                                    <option value="saturday">Sabtu</option>
                                    <option value="sunday">Minggu</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="time_opening">Jam Buka</label>
                                <input type="text" name="time_opening" id="time_opening" class="form-control form-control-sm clockpicker" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="time_closing">Jam Tutup</label>
                                <input type="text" name="time_closing" id="time_closing" class="form-control form-control-sm clockpicker" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tour_type">Jenis Wisata</label>
                                <select name="tour_type" id="tour_type" class="form-control form-control-sm">
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
                                <label for="no_phone">No. Telepon</label>
                                <input type="text" name="no_phone" id="no_phone" class="form-control form-control-sm" placeholder="No. Telepon">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="information">Keterangan</label>
                                <textarea name="information" id="information" cols="10" rows="3" class="form-control form-control-sm" placeholder="Keterangan"></textarea>
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