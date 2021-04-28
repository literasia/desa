@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Administrasi Desa | Surat Kematian')
@section('title-2', 'Surat Kematian')
@section('title-3', 'Surat Kematian')

@section('describ')
    Ini adalah halaman Surat Kematian untuk admin
@endsection

@section('icon-l', 'fa fa-archive')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.administrasi.surat-kematian') }}
@endsection

{{-- main content --}}
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card glass-card d-flex justify-content-center align-items-center p-2">
                <div class=" col-xl-12 card shadow mb-0 p-0">
                    <div class="card-body">
                        <div class="card-block p-2">
                            <div class="dt-responsive table-responsive">
                                <table id="order-table" class="table table-striped nowrap shadow-sm">
                                    <thead class="text-left">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No. Telepon</th>
                                            <th>Alamat</th>
                                            <th>Foto KTP</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-left">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <label class="badge badge-danger">Baru Masuk</label>
                                                <!-- <label class="badge badge-warning">Sedang Diproses</label>
                                                <label class="badge badge-success">Selesai</label> -->
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <h5 align="center" id="confirm">Apakah anda yakin ingin menghapus data ini?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-sm btn-outline-danger">Hapus</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

@include('admin.administrasi.modals._surat-kematian')
@endsection

{{-- addons css --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datedropper/css/datedropper.min.css') }}" />
    <style>
        .btn i {
            margin-right: 0px;
        }
    </style>
@endpush

{{-- addons js --}}
@push('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datedropper/js/datedropper.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.administrasi.surat-kematian') }}",
                },
                columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'no_phone',
                    name: 'no_phone'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'image_ktp',
                    name: 'image_ktp'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });

            $('#form-surat-kematian').on('submit', function (event) {
                event.preventDefault();

                var url = '';
                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.administrasi.surat-kematian.update') }}";
                }

                $('#btn').prop('disabled', true);

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'JSON',
                    data: $(this).serialize(),
                    success: function (data) {
                        var html = ''
                        if (data.errors) {
                            html = data.errors[0];
                            $('#status').addClass('is-invalid');
                            toastr.error(html);
                        }

                        if (data.success) {
                            // toastr.success('Sukses!');
                            if ($('#action').val() == 'edit') {
                                Swal.fire('Sukses!', 'Data berhasil diupdate!', 'success');
                            }
                            $('#modal-surat-kematian').modal('hide');
                            $('#status').removeClass('is-invalid');
                            $('#form-surat-kematian')[0].reset();
                            $('#action').val('add');
                            $('#btn').prop('disabled', false);
                            $('#btn')
                                .removeClass('btn-info')
                                .addClass('btn-success')
                                .val('Simpan');
                            $('#order-table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/administrasi/surat-kematian/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('#action').val('edit');
                        $('#status').val(data.status);
                        $('#hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-surat-kematian').modal('show');
                    }
                });
            });

            var user_id;
            $(document).on('click', '.delete', function () {
                user_id = $(this).attr('id');
                $('#ok_button').text('Hapus');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function () {
                $.ajax({
                    url: '/admin/administrasi/surat-kematian/hapus/'+user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Menghapus...');
                    }, success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#order-table').DataTable().ajax.reload();
                            Swal.fire('Sukses!', 'Data berhasi dihapus!', 'success');
                        }, 1000);
                    }
                });
            });

        });
    </script>
@endpush