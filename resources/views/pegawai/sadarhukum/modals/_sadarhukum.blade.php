<div class="modal fade modal-flex" id="modal-sadarhukum" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Sadar Hukum
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_sadarhukum" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Judul">
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" cols="10" rows="3" class="form-control form-control-sm" placeholder="Deskripsi"></textarea>
                            </div>
                        </div>
                        
                    </div>                    
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <input type="file" name="image" id="image" accept="image/*" value="" autocomplete="off">
                                <label for="image" class="mt-1">
                                    thumbnail:
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