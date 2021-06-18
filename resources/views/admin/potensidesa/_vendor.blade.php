<form id="profile-form" method="POST">
        @csrf
        <div class="row"> 
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="col-12 text-center">
                                <div class="form-group">
                                    <h4 class="mb-4">Foto Profil Vendor</h4>
                                    
                                    {{-- <label for="gallery1" class="sr-only">Pilih Gambar</label> --}}
                                    {{-- <input type="file" id="gallery1" class="gallery" name="photo"> --}}
                                    <div class="input-file">
                                        <span class="btn-upload" target="#gallery1"></span>
                                        <span class="file-selected"></span>
                                        <input type="file" name="photo" id="gallery1" class="gallery"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-block">
                            <h4>Tambah Vendor</h4>
                            <div class="form-group row">
                                <label for="nama_lengkap" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan nama lengkap" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_usaha" class="col-sm-4 col-form-label">Nama Usaha</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan nama usaha" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategoti_usaha" class="col-sm-4 col-form-label">Kategori Usaha</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Pilih kategori usaha" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Ex: Jl. Patuan Nagari, Ps.Porsea " read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cabang" class="col-sm-4 col-form-label">Provinsi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan Provinsi" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cabang" class="col-sm-4 col-form-label">Kabupaten/Kota</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan kabupaten/kota" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cabang" class="col-sm-4 col-form-label">Kecamatan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan Kecamatan" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cabang" class="col-sm-4 col-form-label">Kelurahan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan kelurahan" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rt_rw" class="col-sm-4 col-form-label">RT/RW</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan RT/RW" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nomor_telepon" class="col-sm-4 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan nomor telepon" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nomor_whatsapp" class="col-sm-4 col-form-label">Nomor WhatsApp</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan nomor whasapp" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_name" class="col-sm-4 col-form-label">User Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan user name" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_name" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                <input type="password" id="inputPassword4" class="form-control mx-sm-6" aria-describedby="passwordHelpInline">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat_email" class="col-sm-4 col-form-label">Alamat Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan alamat email" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_direkening" class="col-sm-4 col-form-label">Nama di Rekening</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan nama direkening" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nomor_rekening" class="col-sm-4 col-form-label">Nomor Rekening</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan nomor rekening" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bank_name" class="col-sm-4 col-form-label">Nama Bank</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan nama bank" read>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cabang" class="col-sm-4 col-form-label">Cabang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" name="description" placeholder="Masukkan cabang" read>
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck"> Kirim email ke vendor tentang akun mereka</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                     <div class="modal-footer">
                     <button type="submit" id="button" class="btn btn-sm btn-success">Tambah Profil</button>
                     <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                </div>
             </div>
         </div>
        </div>
    </form>