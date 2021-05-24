<div class="modal fade modal-flex" id="modal-lembagadesa" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Anggota Lembaga
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_lembagadesa" >
                    @csrf
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group name">
                                <label for="name">Nama Anggota</label>
                                <select class="basic-single form-control form-control-sm" name="name" id="name" style="width: 100%;">
                                        <option value="" disabled>Pilih</option>
                                        @foreach($citizen as $ct)
                                        <option value="{{$ct->user_id}}">{{$ct->name}}</option>
                                        @endforeach
                                </select>
                                <!-- <p>Nama tidak ditemukan ? <a href="#" style="color: blue" id="daftar">Daftar Disini !</a></p> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="position">Jabatan</label>
                                <select name="position" id="position" class="form-control form-control-sm">
                                    <option value="Ketua">Ketua</option>
                                    <option value="Wakil Ketua">Wakil Ketua</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Anggota">Anggota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                                <div class="form-group">
                                    <label for="lembaga">Jenis Lembaga</label>
                                    <select name="lembaga" id="jenis-lembaga" class="form-control form-control-sm">
                                        <option value="">Pilih</option>
                                        @foreach($type as $t)
                                        <option value="{{$t->id}}">{{$t->community_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="start_date" class="bmd-label-floating">Tanggal Masuk</label>
                                <input type="text" class="form-control form-control-sm" id="start_date" name="start_date" readonly>
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