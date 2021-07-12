<div class="modal fade modal-flex" id="modal-lembagapenduduk" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Penduduk
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_penduduk" action="">
                @csrf                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name-p">Nama Lengkap</label>
                                <input type="text" name="name" id="name-p" class="form-control form-control-sm" placeholder="Nama Lengkap">
                            </div>
                        </div>                        
                    </div>                         
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control form-control-sm" placeholder="NIK">
                            </div>
                        </div>  
                        <div class="col">
                            <div class="form-group">
                                <label for="no_kk">No KK</label>
                                <input type="text" name="no_kk" id="no_kk" class="form-control form-control-sm" placeholder="NO KK">
                            </div>
                        </div>                
                    </div>                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="Email">
                            </div>
                        </div> 
                        <div class="col">
                            <div class="form-group">
                                <label for="phone">No HP</label>
                                <input type="text" name="phone" id="phone" class="form-control form-control-sm" placeholder="No HP">
                            </div>
                        </div>                 
                    </div>         
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password">
                            </div>
                        </div>                
                    </div>       
            </div>         
            <div class="modal-footer">
                <input type="hidden" id="action-p" val="add">
                <button type="submit" id="button-p" class="btn btn-boy btn-sm btn-success">Simpan</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>