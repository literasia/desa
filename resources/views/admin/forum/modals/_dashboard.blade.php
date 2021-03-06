<div class="modal fade modal-flex" id="modal-berita" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Forum</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-news" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Judul Forum</label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm" type="text" placeholder="Masukkan Judul Forum"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Masukkan Keterangan"></textarea>
                    </div>
                <div class="row">
                <div class="col">
                        <div class="form-group">
                                   <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                    <option value="">Forum</option>                                                                
                                    </select>
                                </div>
                        </div>
                        <div class="col">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                    <option value="">Terbuka</option>
                                    <option value="">Tertutup</option>                                    
                                    </select>
                                </div>
                        </div>
                        <div class="col">
                                <div class="form-group">
                                    <label for="visibility">Visibility</label>
                                    <select name="visibility" id="visibility" class="form-control form-control-sm">
                                    <option value="">Public</option>
                                    <option value="">Private</option>
                                    <option value="">Hidden</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="Parent">Parent</label>
                                <select name="Parent" id="Parent" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tautan">Moderator</label>
                                <input data-role="moderatorinput" type="text" name="moderator" id="judul_forum" class="form-control form-control-sm">
                                <div style="color: grey; font-size:80%">Pisahkan Moderator dengan koma (,)</div>
                            </div>
                        </div> 
                    </div>
                    </div>
                    </form>
                    <div class="modal-footer">                        
                        <input type="add" class="btn btn-sm btn-success" value="Tambah" id="btn">
                    </div>                   
                </form>               
            </div>
        </div>
    </div>
</div>