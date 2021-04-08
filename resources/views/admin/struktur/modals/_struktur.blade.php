<div class="modal fade modal-flex" id="modal-struktur" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="modal-title">
                    Struktur Desa
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="form-struktur">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="employee-id">Nama Pegawai</label>
                                <select name="employee_id" id="employee-id" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="position-id">Jabatan</label>
                                <select name="position_id" id="position-id" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="level">Golongan</label>
                                <select name="level" id="level" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    <option value="golongan1a">Golongan 1A</option>
                                    <option value="golongan1b">Golongan 1B</option>
                                    <option value="golongan1c">Golongan 1C</option>
                                    <option value="golongan1d">Golongan ID</option>
                                    <option value="golongan2a">Golongan 2A</option>
                                    <option value="golongan2b">Golongan 2B</option>
                                    <option value="golongan2c">Golongan 2C</option>
                                    <option value="golongan2d">Golongan 2D</option>
                                    <option value="golongan3a">Golongan 3A</option>
                                    <option value="golongan3b">Golongan 3B</option>
                                    <option value="golongan3c">Golongan 3C</option>
                                    <option value="golongan3d">Golongan 3D</option>
                                    <option value="golongan4a">Golongan 4A</option>
                                    <option value="golongan4b">Golongan 4B</option>
                                    <option value="golongan4c">Golongan 4C</option>
                                    <option value="golongan4d">Golongan 4D</option>
                                    <option value="golongan4e">Golongan 4E</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    <option value="honor">Honor</option>
                                    <option value="pegawai_tetap">Pegawai Tetap</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="parent-id-group">
                        <div class="col">
                            <div class="form-group">
                                <label for="parent_id">Atasan</label>
                                <select name="parent_id" id="parent-id" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                </select>
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