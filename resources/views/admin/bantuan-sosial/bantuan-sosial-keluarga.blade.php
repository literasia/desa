@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Bantuan Sosial | Bantuan Sosial Per Keluarga')
@section('title-2', 'Bantuan Sosial Per Keluarga')
@section('title-3', 'Bantuan Sosial Per Keluarga')

@section('describ')
    Ini adalah halaman bantuan sosial per keluarga untuk admin
@endsection

@section('icon-l', 'icon-list')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.bantuan-sosial.bantuan-sosial-individu') }}
@endsection

{{-- main content --}}
@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card glass-card d-flex justify-content-center align-items-center p-2">
                <div class=" col-xl-12 card shadow mb-0 p-0">
                    <div class="card-body">
                        <div class="card-block p-2">
                        <button id="add" class="btn btn-outline-primary shadow-sm my-3"><i class="fa fa-plus"></i></button>
                            <div class="dt-responsive table-responsive">
                                <table id="order-table" class="table table-striped nowrap shadow-sm">
                                    <thead class="text-left">
                                        <tr>
                                            <th>No</th>
                                            <th>No KK</th>
                                            <th>NIK</th>
                                            <th>ID DTKS/BDT & ART</th>
                                            <th>Kepala Keluarga</th>
                                            <th>Jenis Bantuan</th>
                                            <th>Tahap</th>
                                            <th>Total</th>
                                            <th>Status Penerimaan</th>
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

    {{-- Modal --}}
    @include('admin.bantuan-sosial.modals._status_bansos_keluarga')
    @include('admin.bantuan-sosial.modals._bantuan_sosial_keluarga')
@endsection

{{-- addons css --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datedropper/css/datedropper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
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
<script src="{{ asset('js/toastr.min.js') }}"></script>

<script>
        $(document).ready(function () {

            $('#add').on('click', function () {
                $('.modal-title').html('Tambah Jenis Bantuan Sosial');
                $('#action').val('add');
                $('.form-control').val('');
                $('#btn')
                    .removeClass('btn-info')
                    .addClass('btn-success')
                    .val('Simpan');
                $('#modal-bantuan-sosial-keluarga').modal('show');
            });

            $('#create_date').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });

            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.bantuan-sosial.bantuan-sosial-keluarga') }}",
                },
                columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'no_kk',
                    name: 'no_kk'
                },
                {
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'id_dtks',
                    name: 'id_dtks'
                },
                {
                    data: 'kepala_keluarga',
                    name: 'kepala_keluarga'
                },
                {
                    data: 'jenis_bantuan',
                    name: 'jenis_bantuan'
                },
                {
                    data: 'tahap',
                    name: 'tahap'
                },
                {
                    data: 'total',
                    name: 'total'
                },
                {
                    data: 'status_penerimaan',
                    name: 'status_penerimaan'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });

            $(document).on('click', '.edit-status', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/bantuan-sosial/bantuan-sosial-keluarga/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('#action').val('edit');

                        let numberOfStages = data.number_of_stages;
                        $("#status").empty();
                        $("#status").append(new Option(`Belum`, `belum`));
                        if (numberOfStages > 1) {
                            for (let index = 0; index < numberOfStages; index++) {
                                $("#status").append(new Option(`Tahap ke ${index + 1}`, `tahap ke ${index + 1}`));
                            }
                        }
                        $("#status").append(new Option(`Selesai`, `selesai`));
                        console.log(data);
                        $('#status').val(data.status_penerimaan);
                        $('.hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-status-bansos-keluarga').modal('show');
                    }
                });
            });


            // update status bansos
            $('#form-status-bansos-keluarga').on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData($('#form-status-bansos-keluarga')[0]);

                $('#btn').prop('disabled', true);

                $.ajax({
                    url: "{{ route('admin.bantuan-sosial.bantuan-sosial-keluarga.update-status') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var html = ''
                        if (data.errors) {
                            html = data.errors[0];
                            $('#status_penerimaan').addClass('is-invalid');
                            toastr.error(html);
                            $('#btn').prop('disabled', false);
                        }

                        if (data.success) {
                            // toastr.success('Sukses!');
                            Swal.fire('Sukses!', 'Data berhasi diupdate!', 'success');
                            
                            $('#modal-status-bansos-keluarga').modal('hide');
                            $('#status_penerimaan').addClass('is-invalid');
                            $('#form-status-bansos-keluarga')[0].reset();
                            $('#btn').prop('disabled', false);
                            $('#btn')
                                .val('Simpan');
                            $('#order-table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    },
                    error: function(errors){
                        toastr.error('Error');
                        $('#btn').prop('disabled', false);
                    }
                });
            });

            $('#form-bantuan-sosial-keluarga').on('submit', function (event) {
                event.preventDefault();

                var url = '';
                if ($('#action').val() == 'add') {
                    url = "{{ route('admin.bantuan-sosial.bantuan-sosial-keluarga.store') }}";
                }

                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.bantuan-sosial.bantuan-sosial-keluarga.update') }}";
                }

                var formData = new FormData($('#form-bantuan-sosial-keluarga')[0]);

                $('#btn').prop('disabled', true);

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
                            $('#name').addClass('is-invalid');
                            $('#family_id').addClass('is-invalid');
                            $('#social_assistance_type_id').addClass('is-invalid');
                            $('#id_art').addClass('is-invalid');
                            $('#id_dtks').addClass('is-invalid');
                            toastr.error(html);
                            $('#btn').prop('disabled', false);
                        }

                        if (data.success) {
                            // toastr.success('Sukses!');

                            if ($('#action').val() == 'add') {
                                Swal.fire('Sukses!', 'Data berhasi ditambahkan!', 'success');
                            }

                            if ($('#action').val() == 'edit') {
                                Swal.fire('Sukses!', 'Data berhasi diupdate!', 'success');
                            }
                            
                            $('#modal-bantuan-sosial-keluarga').modal('hide');
                            $('#family_id').removeClass('is-invalid');
                            $('#social_assistance_type_id').removeClass('is-invalid');
                            $('#id_art').removeClass('is-invalid');
                            $('#id_dtks').removeClass('is-invalid');
                            $('#form-bantuan-sosial-keluarga')[0].reset();
                            $('#action').val('add');
                            $('#btn').prop('disabled', false);
                            $('#btn')
                                .val('Simpan');
                            $('#order-table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    },
                    error: function(errors){
                        toastr.error('Error');
                        $('#btn').prop('disabled', false);
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/bantuan-sosial/bantuan-sosial-keluarga/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('#action').val('edit');
                        $('#family_id').val(data.family_id);
                        $('#social_assistance_type_id').val(data.social_assistance_type_id);
                        $('#id_dtks').val(data.id_dtks);
                        $('#id_art').val(data.id_art);
                        $('#total').val(data.total);
                        $('.hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-bantuan-sosial-keluarga').modal('show');
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
                    url: '/admin/bantuan-sosial/bantuan-sosial-keluarga/hapus/'+user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Menghapus...');
                    }, success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#order-table').DataTable().ajax.reload();
                            // toastr.success('Data berhasil dihapus');
                            Swal.fire('Sukses!', 'Data berhasi dihapus!', 'success');
                        }, 1000);
                    }
                });
            });

        });
    </script>
@endpush