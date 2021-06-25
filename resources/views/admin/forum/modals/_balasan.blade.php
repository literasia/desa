<div class="modal fade modal-flex" id="modal-berita" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Balasan</h4>
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
                                <label for="title">Judul Balasan</label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm" type="text" placeholder="Masukkan Judul Balasan"  />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Masukkan Keterangan"></textarea>
                    </div>
                </form>
                <div class="row">
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
                                    <label for="topik">Topik</label>
                                    <select name="topik" id="status" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    </select>
                                </div>
                        <div class="modal-footer">
                            <input type="add" class="btn btn-sm btn-success" value="Tambah" id="btn">
                        </div>                
                </form> 
            </div>
        </div>
    </div>
</div>