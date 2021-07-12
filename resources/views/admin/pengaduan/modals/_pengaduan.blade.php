<div class="modal fade modal-flex" id="modal-pengaduan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <form id="form-pengaduan">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option readonly disabled>Pilih</option>
                                    <option value="accepted">Diterima</option>
                                    <option value="processing">Tindak Lanjuti</option>
                                    <option value="success">Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="feedback">Pesan Pemberitahuan</label>
                                <textarea name="feedback" id="feedback" cols="10" rows="3" class="form-control form-control-sm" placeholder="Feedback Message"></textarea>
                            </div>
                        </div>    
                    </div>
                    <div class="modal-footer" style="margin-bottom: -20px; border-top: none;">
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