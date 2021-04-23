<div class="modal fade modal-flex" id="modal-view-keluarga" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="modal-title">
                    Lihat Keluarga
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="alert alert-primary shadow">
                    <div class="badge badge-info rounded mb-3"><h6 class="m-0">Nomor Kartu Keluarga</h6></div>
                    <h4 class="text-dark font-weight-bold" id="no_kk"></h4>
                </div>

                <div class="mt-5 family-modal-wrapper">
                    <h5 class="font-weight-bold d-inline-block family-modal-caption mt-4 px-2 text-info">Anggota Keluarga</h5>
                    <div class="border rounded p-3">
                        <table class="table table-striped">
                            <thead>
                                <tr class="font-weight-bold">
                                    <td>Nama</td>
                                    <td>NIK</td>
                                    <td>Status Dalam Keluarga</td>
                                </tr>
                            </thead>
                            <tbody id="family_group">
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-5 family-modal-wrapper">
                    <h5 class="font-weight-bold d-inline-block mt-4 px-2 family-modal-caption text-info">Domisili</h5>
                    <div class="border rounded p-3">
                        <table class="table table-striped">
                            <tr>
                                <td class="font-weight-bold">Provinsi</td>
                                <td id="provinsi"></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Kabupaten</td>
                                <td id="kabupaten"></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Kecamatan</td>
                                <td id="kecamatan"></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Desa</td>
                                <td id="desa"></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Alamat</td>
                                <td id="alamat"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>