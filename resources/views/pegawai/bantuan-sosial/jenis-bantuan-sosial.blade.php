@extends('layouts.pegawai')

{{-- config 1 --}}
@section('title', 'Bantuan Sosial | Jenis Bantuan Sosial')
@section('title-2', 'Jenis Bantuan Sosial')
@section('title-3', 'Jenis Bantuan Sosial')

@section('describ')
    Ini adalah halaman jenis bantuan sosial untuk pegawai
@endsection

@section('icon-l', 'icon-list')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('pegawai.bantuan-sosial.jenis-bantuan-sosial') }}
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
                                            <th>Nama Bantuan</th>
                                            <th>Menggunakan Nomor Identitas</th>
                                            <th>Jumlah Tahapan</th>
                                            <th>Bulan</th>
                                            <th>Total Bantuan</th>
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
    @include('pegawai.bantuan-sosial.modals._jenis_bantuan_sosial')
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
                $('#title').val('');
                $('#category').val('');
                $('#content').val('');
                $('#create_date').val('');
                $('#btn')
                    .removeClass('btn-info')
                    .addClass('btn-success')
                    .val('Simpan');
                $('#modal-jenis-bantuan-sosial').modal('show');
            });

            $('#create_date').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });

            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pegawai.bantuan-sosial.jenis-bantuan-sosial') }}",
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
                    data: 'identity_number_status',
                    name: 'identity_number_status'
                },
                {
                    data: 'number_of_stages',
                    name: 'number_of_stages'
                },
                {
                    data: 'month',
                    name: 'month'
                },
                {
                    data: 'total',
                    name: 'total'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });

            $('#form-jenis-bantuan-sosial').on('submit', function (event) {
                event.preventDefault();

                var url = '';
                if ($('#action').val() == 'add') {
                    url = "{{ route('pegawai.bantuan-sosial.jenis-bantuan-sosial.store') }}";
                }

                if ($('#action').val() == 'edit') {
                    url = "{{ route('pegawai.bantuan-sosial.jenis-bantuan-sosial.update') }}";
                }

                var formData = new FormData($('#form-jenis-bantuan-sosial')[0]);

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
                            $('#identity_number_status').addClass('is-invalid');
                            $('#number_of_stages').addClass('is-invalid');
                            $('#total').addClass('is-invalid');
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
                            
                            $('#modal-jenis-bantuan-sosial').modal('hide');
                            $('#name').removeClass('is-invalid');
                            $('#identity_number_status').removeClass('is-invalid');
                            $('#number_of_stages').removeClass('is-invalid');
                            $('#total_bantuan').removeClass('is-invalid');
                            $('#form-jenis-bantuan-sosial')[0].reset();
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
                    url: '/pegawai/bantuan-sosial/jenis-bantuan-sosial/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        console.log(data);
                        $('#action').val('edit');
                        $('#name').val(data.name);
                        $('#identity_number_status').val(data.identity_number_status);
                        $('#number_of_stages').val(data.number_of_stages);
                        $('#total').val(data.total);
                        $('#month').val(data.month);
                        $('#hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-jenis-bantuan-sosial').modal('show');
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
                    url: '/pegawai/bantuan-sosial/jenis-bantuan-sosial/hapus/'+user_id,
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