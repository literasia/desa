@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Potensidesa | Vendor ')
@section('title-2', 'Vendor')
@section('title-3', 'Vendor')

@section('describ')
    Ini adalah halaman untuk menambahkan Vendor 
@endsection

@section('icon-l', 'icon-list')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.potensidesa.vendor') }}
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
                                            <th>Email</th>
                                            <th>No. Tlp</th>
                                            <th>No. WhatsApp</th>
                                            <th>Tgl Mulai</th>
                                            <th>Status</th>
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
    @include('admin.potensidesa._vendor')
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
                $('.modal-title').html('Tambah Vendor');
                $('#action').val('add');
                $('#title').val('');
                $('#category').val('');
                $('#content').val('');
                $('#create_date').val('');
                $('#btn')
                    .removeClass('btn-info')
                    .addClass('btn-success')
                    .val('Simpan');
                $('#modal-vendor').modal('show');
            });

            $('#create_date').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });

            // $('#order-table').DataTable();

            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.potensidesa.vendor') }}",
                },
                columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email_address',
                    name: 'email_address'
                },
                {
                    data: 'phone_number',
                    name: 'phone_number'
                },
                {
                    data: 'whatsapp_number',
                    name: 'whatsapp_number'
                },
                {
                    data: 'date',
                    name: 'date'
                }
                {
                    data: 'status',
                    name: 'status'
                }
                ]
            });

            $('#form-news').on('submit', function (event) {
                event.preventDefault();

                var url = '';
                if ($('#action').val() == 'add') {
                    url = "{{ route('admin.potensidesa.vendor') }}";
                }

                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.potensidesa.vendor') }}";
                }

                var formData = new FormData($('#form-news')[0]);

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
                            $('#title').addClass('is-invalid');
                            $('#category').addClass('is-invalid');
                            $('#content').addClass('is-invalid');
                            $('#create_date').addClass('is-invalid');
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
                            
                            $('#modal-vendor').modal('hide');
                            $('#title').removeClass('is-invalid');
                            $('#category').removeClass('is-invalid');
                            $('#content').removeClass('is-invalid');
                            $('#create_date').removeClass('is-invalid');
                            $('#form-news')[0].reset();
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
                    url: '/admin/potensidesa/vendor/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('#action').val('edit');
                        $('#title').val(data.name);
                        $('#category').val(data.category);
                        $('#content').val(data.content);
                        $('#create_date').val(data.create_date);
                        $('#hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-vendor').modal('show');
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
                    url: '/admin/potensidesa/vendor/hapus/'+user_id,
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