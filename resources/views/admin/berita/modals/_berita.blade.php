<div class="modal fade modal-flex" id="modal-berita" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Berita
                </h4>
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
                                <label for="title">Judul</label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <select name="category" id="category" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    @foreach ($category as $ct)
                                        <option value="{{ $ct->name }}">{{ $ct->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="create_date">Tanggal Rilis</label>
                                <input id="create_date" name="create_date" class="form-control form-control-sm" type="text" placeholder="Tanggal Rilis" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="content">Isi Berita</label>
                                <textarea name="content" id="content" cols="10" rows="3" class="form-control form-control-sm" placeholder="Isi Berita"></textarea>
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