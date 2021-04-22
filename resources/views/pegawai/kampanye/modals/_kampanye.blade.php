<div class="modal fade modal-flex" id="modal-kampanye" tabindex="-1" role="dialog">
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
                <form id="form-campaign" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="candidate">Nama Calon</label>
                                <input type="text" name="candidate" id="candidate" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="deputy_candidate">Nama Calon Wakil</label>
                                <input type="text" name="deputy_candidate" id="deputy_candidate" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="vision">Visi</label>
                                <textarea type="text" class="form-control" id="vision" name="vision" placeholder="Visi" cols="10" rows="3"></textarea> 
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="mission">Misi</label>
                                <textarea type="text" class="form-control" id="mission" name="mission" placeholder="Misi" cols="10" rows="3"></textarea> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="image">Foto</label>
                                <input type="file" name="image" id="image" accept="image/*" value="" autocomplete="off">
                                <label for="image" class="mt-1">
                                    Foto:
                                    <small class="text-muted">max. 3MB</small>
                                </label>
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
