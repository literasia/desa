<div class="modal fade modal-flex" id="modal-profile-employee" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Profile
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-profile-employee" enctype="multipart/form-data">
                    @csrf @method('POST')
                    <div class="row">
                        <div class="col" id="password-lama-group">
                            <div class="form-group">
                                <label for="password">Password Lama:</label>
                                <input type="password" name="password_lama" id="password_lama" class="form-control form-control-sm" placeholder="Password">
                                <p class="form-text text-muted" id="old-password-message"></p>
                            </div>
                        </div>
                        <div class="col" id="password-baru-group">
                            <div class="form-group">
                                <label for="password">Password Baru:</label>
                                <input type="password" name="password_baru" id="password_baru" class="form-control form-control-sm" placeholder="Password">
                            </div>
                        </div>
                        <div class="col" id="password-konfirmasi-group">
                            <div class="form-group">
                                <label for="password">Konfirmasi Password:</label>
                                <input type="password" name="confirmation_password" id="password_konfirmasi" class="form-control form-control-sm" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <input type="submit" class="btn btn-sm btn-info" value="Update" id="btn"> --}}
                        <button type="submit" class="btn btn-sm btn-info" id="btnUpdate">Update</button>
                        <button type="button" class="btn btn-sm btn-outline-info" data-dismiss="modal" id="btnCancel">Batal</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>