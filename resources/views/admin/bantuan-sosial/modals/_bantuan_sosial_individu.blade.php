<div class="modal fade modal-flex" id="modal-bantuan-sosial-individu" tabindex="-1" role="dialog">
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
                <form id="form-bantuan-sosial-individu" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="citizen_id">Nama Penduduk</label>
                                <select name="citizen_id" id="citizen_id" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    @foreach ($citizens as $citizen)
                                        <option value="{{ $citizen->id }}">{{ $citizen->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="social_assistance_type_id">Jenis Bantuan Sosial</label>
                                <select name="social_assistance_type_id" id="social_assistance_type_id" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    @foreach ($social_assistance_types as $social_assistance_type)
                                        <option value="{{ $social_assistance_type->id }}">{{ $social_assistance_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="id_dtks">ID DTKS</label>
                                <input type="text" name="id_dtks" id="id_dtks" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="id_art">ID ART</label>
                                <input type="text" name="id_art" id="id_art" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" class="hidden_id">
                        <input type="hidden" id="action" val="add">
                        <input type="submit" class="btn btn-sm btn-success" value="Simpan" id="btn">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>