@extends('layouts.admin')

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
            <div class="card glass-card d-flex justify-content-center align-items-center p-2">
                <div class=" col-xl-12 card shadow mb-0 p-0">
                    <div class="card-body">
                        <div class="card-block p-2">
                            <div class="dt-responsive table-responsive">
                            <button id="add" class="btn btn-outline-primary shadow-sm my-3"><i class="fa fa-plus"></i></button>
                                <table id="order-table" class="table table-striped nowrap shadow-sm">
                                    <thead class="text-left">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>NIP</th>
                                            <th>Foto</th>
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

    @include('admin.struktur.modals._pegawai')
@endsection

{{-- addons css --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/select2/css/select2.min.css') }}" />
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
    <script type="text/javascript" src="{{ asset('bower_components/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('bower_components/datedropper/js/datedropper.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Show Modal
            $('#add').on('click', function () {
                $('.modal-title').html('Tambah Pegawai');
                $('#action').val('add');
                $('#name').val('');
                $('#nik').val('');
                $('#nip').val('');
                $('#username').val('');
                $('#password').val('');
                $('#password-confirmation').val('');
                $('#password-group').css('display', 'block');
                $('#password-confirmation-group').css('display', 'block');
                $('#btn')
                    .removeClass('btn-info')
                    .addClass('btn-success')
                    .val('Simpan');
                $('#modal-pegawai').modal('show');
            });
            // Show DataTables
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
                    data: 'photo',
                    name: 'photo'
                },
                {
                    data: 'user_id',
                    name: 'user_id'
                },
                {
                    data: 'action',
                    name: 'action'
                },
                ]
            });
            // Event Submit
            $('#form-pegawai').on('submit', function (event) {
                event.preventDefault();
                let url = '';
                if ($('#action').val() == 'add') {
                    url = "{{ route('admin.struktur.pegawai.store') }}";
                }
                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.struktur.pegawai.update') }}";
                }
                let formData = new FormData($('#form-pegawai')[0]);

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data)
                        var html = ''
                        // If has Errors
                        if (data.errors) {
                            data.errors.name ? $('#name').addClass('is-invalid') : $('#name').removeClass('is-invalid')
                            data.errors.nik ? $('#nik').addClass('is-invalid') : $('#nik').removeClass('is-invalid')
                            data.errors.nip ? $('#nip').addClass('is-invalid') : $('#nip').removeClass('is-invalid')
                            data.errors.username ? $('#username').addClass('is-invalid') : $('#username').removeClass('is-invalid')
                            data.errors.password ? $('#password').addClass('is-invalid') : $('#password').removeClass('is-invalid')
                            if (data.errors.password == "The password confirmation does not match.") {
                                $('#password_confirmation').addClass('is-invalid');
                                $('#password-help').css('display', 'block')
                            }else{
                                $('#password_confirmation').removeClass('is-invalid');
                                $('#password-help').css('display', 'none')
                            }
                            toastr.error(data.error);
                        }

                        // if passed
                        if (data.success) {
                            Swal.fire(
                            'Sukses!',
                            'Data berhasil ditambahkan!',
                            'success'
                            )
                            $('#modal-pegawai').modal('hide');
                            $('#name').removeClass('is-invalid');
                            $('#nik').removeClass('is-invalid');
                            $('#nip').removeClass('is-invalid');
                            $('#username').removeClass('is-invalid');
                            $('#password').removeClass('is-invalid');
                            $('#password_confirmation').removeClass('is-invalid');
                            $('#form-pegawai')[0].reset();
                            $('#action').val('add');
                            $('#btn')
                                .val('Simpan');
                            $('#order-table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                });
            });
            // Get datas show on inputs
            $(document).on('click', '.edit', function () {
                let id = $(this).attr('id');
                $.ajax({
                    url: '/admin/struktur/pegawai/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('.modal-title').html('Edit Pegawai');
                        $('#action').val('edit');
                        $('#name').val(data.name);
                        $('#nik').val(data.nik);
                        $('#nip').val(data.nip);
                        $('#username').val(data.username);
                        $('#password').val(data.password);
                        $('#password-confirmation').val(data.password);
                        $('#village_id').val(data.village_id);
                        $('#password-group').css('display', 'none');
                        $('#password-confirmation-group').css('display', 'none');
                        $('#hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-pegawai').modal('show');
                    }
                });
            });
            // Even Delete
            let user_id;
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
                            Swal.fire('Sukses!', 'Data berhasil dihapus!', 'success');
                        }, 1000);
                    }
                });
            });
        });
    </script>
@endpush
