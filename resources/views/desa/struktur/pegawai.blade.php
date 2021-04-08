@extends('layouts.desa')

{{-- config 1 --}}
@section('title', 'Struktur Desa | Pegawai')
@section('title-2', 'Pegawai')
@section('title-3', 'Pegawai')

@section('describ')
    Ini adalah halaman Pegawai untuk admin
@endsection

@section('icon-l', 'fa fa-project-diagram')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.struktur.pegawai') }}
@endsection

{{-- main content --}}
@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block pt-0">
                        <div class="dt-responsive table-responsive">
                        <button id="add" class="btn btn-outline-primary shadow-sm my-3"><i class="fa fa-plus"></i></button>
                            <table id="order-table" class="table table-striped nowrap shadow-sm">
                                <thead class="text-left">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>NIP</th>
                                        <th>Username</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-left">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal --}}
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

    @include('desa.struktur.modals._pegawai')
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
    <script>
        $(document).ready(function () {
            $('#add').on('click', function () {
                $('#modal-pegawai').modal('show');
            });

            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.struktur.pegawai') }}",
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
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'nip',
                    name: 'nip'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });

            $('#form-pegawai').on('submit', function (event) {
                event.preventDefault();

                var url = '';
                if ($('#judul').val() == 'add') {
                    url = "{{ route('admin.struktur.pegawai.store') }}";
                }

                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.struktur.pegawai.update') }}";
                }

                var formData = new FormData($('#form-pegawai')[0]);

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var html = ''
                        if (data.errors) {
                            html = data.errors[0];
                            $('#title').addClass('is-invalid');
                            toastr.error(html);
                        }

                        if (data.success) {
                            toastr.success('Sukses!');
                            $('#modal-pegawai').modal('hide');
                            $('#title').removeClass('is-invalid');
                            $('#form-pegawai')[0].reset();
                            $('#action').val('add');
                            $('#btn')
                                .removeClass('btn-outline-info')
                                .addClass('btn-outline-success')
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
                    url: '/admin/struktur/pegawai/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('#action').val('edit');
                        $('#name').val(data.name);
                        $('#nik').val(data.nik);
                        $('#nip').val(data.nip);
                        $('#username').val(data.username);
                        $('#password').val(data.password);
                        $('#hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-outline-success')
                            .addClass('btn-outline-info')
                            .val('Update');
                        $('#modal-pegawai').modal('show');
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
                    url: '/admin/struktur/pegawai/hapus/'+user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Menghapus...');
                    }, success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#order-table').DataTable().ajax.reload();
                            toastr.success('Data berhasil dihapus');
                        }, 1000);
                    }
                });
            });
        });
    </script>
@endpush