<div class="modal fade modal-flex" id="modal-status-bansos-individu" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <form id="form-status-bansos-individu">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status_penerimaan" id="status" class="form-control form-control-sm">
                                    <option readonly>Pilih</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin-bottom: -20px; border-top: none;">
                        <input type="hidden" name="hidden_id" class="hidden_id">
                        <input type="submit" class="btn btn-sm btn-success" value="Simpan" id="btn">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>