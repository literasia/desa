@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Wisata Desa')
@section('title-2', 'Wisata Desa')
@section('title-3', 'Wisata Desa')

@section('describ')
    Ini adalah halaman Wisata Desa untuk admin
@endsection

@section('icon-l', 'fa fa-map-marker-alt')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.wisata-desa.wisata-desa') }}
@endsection

{{-- main content --}}
@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block pt-0">
                        <button id="add" class="btn btn-outline-primary shadow-sm my-3"><i class="fa fa-plus"></i></button>
                        <div class="dt-responsive table-responsive">
                            <table id="order-table" class="table table-striped nowrap shadow-sm">
                                <thead class="text-left">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tempat</th>
                                        <th>Alamat</th>
                                        <th>Hari Buka</th>
                                        <th>Jam Buka</th>
                                        <th>Jam Tutup</th>
                                        <th>Jenis Wisata</th>
                                        <th>Nomor Telepon</th>
                                        <th>Keterangan</th>
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
    @include('admin.wisata-desa.modals._wisata')
@endsection

{{-- addons css --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datedropper/css/datedropper.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-clockpicker.min.css') }}" />
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
    <script src="{{ asset('js/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('bower_components/datedropper/js/datedropper.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('#add').on('click', function () {
                $('.modal-title').html('Tambah Wisata Desa');
                $('#action').val('add');
                $('#name').val('');
                $('#address').val('');
                $('#day_open').val('');
                $('#time_opening').val('');
                $('#time_closing').val('');
                $('#tour_type').val('');
                $('#no_phone').val('');
                $('#information').val('');
                $('#btn')
                    .removeClass('btn-info')
                    .addClass('btn-success')
                    .val('Simpan');
                $('#modal-wisata').modal('show');
            });

            $('.clockpicker').clockpicker({
                donetext: 'Done',
                autoclose: true
            });

            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.wisata-desa.wisata-desa') }}",
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
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'day_open',
                    name: 'day_open'
                },
                {
                    data: 'time_opening',
                    name: 'time_opening'
                },
                {
                    data: 'time_closing',
                    name: 'time_closing'
                },
                {
                    data: 'tour_type',
                    name: 'tour_type'
                },
                {
                    data: 'no_phone',
                    name: 'no_phone'
                },
                {
                    data: 'information',
                    name: 'information'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });

            $('#form-tour').on('submit', function (event) {
                event.preventDefault();

                var url = '';
                if ($('#action').val() == 'add') {
                    url = "{{ route('admin.wisata-desa.wisata-desa') }}";
                }

                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.wisata-desa.wisata-desa-update') }}";
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
                            $('#name').addClass('is-invalid');
                            $('#address').addClass('is-invalid');
                            $('#day_open').addClass('is-invalid');
                            $('#time_opening').addClass('is-invalid');
                            $('#time_closing').addClass('is-invalid');
                            $('#tour_type').addClass('is-invalid');
                            $('#no_phone').addClass('is-invalid');
                            toastr.error(html);
                            $('#btn').prop('disabled', false);
                        }

                        if (data.success) {
                            if ($('#action').val() == 'add') {
                                Swal.fire('Sukses!', 'Data berhasi ditambahkan!', 'success');
                            }

                            if ($('#action').val() == 'edit') {
                                Swal.fire('Sukses!', 'Data berhasi diupdate!', 'success');
                            }
                            
                            $('#modal-wisata').modal('hide');
                            $('#name').removeClass('is-invalid');
                            $('#address').removeClass('is-invalid');
                            $('#day_open').removeClass('is-invalid');
                            $('#time_opening').removeClass('is-invalid');
                            $('#time_closing').removeClass('is-invalid');
                            $('#tour_type').removeClass('is-invalid');
                            $('#no_phone').removeClass('is-invalid');
                            $('#form-tour')[0].reset();
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
                    url: '/admin/wisata-desa/wisata-desa/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('.modal-title').html('Edit Wisata Desa')
                        $('#action').val('edit');
                        $('#name').val(data.name);
                        $('#address').val(data.address);
                        $('#day_open').val(data.day_open);
                        $('#time_opening').val(data.time_opening);
                        $('#time_closing').val(data.time_closing);
                        $('#tour_type').val(data.tour_type);
                        $('#no_phone').val(data.no_phone);
                        $('#information').val(data.information);
                        $('#hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-wisata').modal('show');
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
                    url: '/admin/wisata-desa/wisata-desa/hapus/'+user_id,
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
