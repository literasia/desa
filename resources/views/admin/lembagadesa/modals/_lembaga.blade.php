<div class="modal fade modal-flex" id="modal-lembaga" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Nama Lembaga
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
                                <label for="Ketua">Ketua</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="Wakil Ketua">Wakil Ketua</label>
                            </div>
                        </div>                        
                    </div>                      
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="Sekretaris">Sekretaris</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="Bendahara">Bendahara</label>
                            </div>
                        </div>                        
                    </div>                         
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="Anggota">Anggota</label>
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