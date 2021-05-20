<div class="modal fade modal-flex" id="modal-jenislembaga" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Jenis Lembaga
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_pindah" action="">
                @csrf                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="Jensi Lembaga">Jenis Lembaga</label>
                                <input type="text" name="Jensi Lembaga" id="Jensi Lembaga" class="form-control form-control-sm" placeholder="Jenis Lembaga">
                            </div>
                        </div>                        
                    </div>                         
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="visi misi">Visi Misi</label>
                                <textarea name="visi misi" id="visi misi" cols="10" rows="3" class="form-control form-control-sm" placeholder="Visi Misi"></textarea>
                            </div>
                        </div>    
                    </div>                    
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <input type="file" name="image" id="image" accept="image/*" value="" autocomplete="off">
                                <label for="image" class="mt-1">
                                    Logo :
                                    <small class="text-muted">max. 3MB</small>
                                </label>
                            </div>
                        </div>
                    </div>                
            <div class="modal-footer">
                <button type="submit" id="button" class="btn btn-sm btn-success">Simpan</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>