@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Peristiwa | Kelahiran')
@section('title-2', 'Kelahiran')
@section('title-3', 'Kelahiran')

@section('describ')
    Ini adalah halaman Kelahiran untuk admin
@endsection

@section('icon-l', 'fa fa-chart-bar')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.peristiwa.kelahiran') }}
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card glass-card d-flex justify-content-center align-items-center p-2">
            <div class=" col-xl-12 card shadow mb-0 p-0">
                <div class="card-body">
                    <div class="card-block p-2">
                    <button id="add" class="btn btn-outline-primary shadow-sm my-3"><i class="fa fa-plus"></i></button>
                        <div class="dt-responsive table-responsive">
                            <table id="order-table" class="table table-striped table-bordered nowrap shadow-sm">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Nama Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
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
@include('admin.peristiwa.modals._kelahiran')

<div id="confirmModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <h5 align="center" id="confirm">Apakah anda yakin ingin menghapus data ini?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button1" id="btn-delete" class="delete_btn btn btn-sm btn-outline-danger">Hapus</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        $(document).ready(function () {
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.peristiwa.kelahiran') }}",
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
                    data: 'birthplace',
                    name: 'birthplace'
                },
                {
                    data: 'birthdate',
                    name: 'birthdate'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'religion',
                    name: 'religion'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'dadname',
                    name: 'dadname'
                },
                {
                    data: 'momname',
                    name: 'momname'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });

            
            $('#birthdate').dateDropper({
                theme: 'leaf',
                format: 'Y-m-d'
            });


            $('#add').on('click', function() {
            $('.modal-title').html('Tambah Kelahiran');
            $('#form-kelahiran form').attr('action', 'add');
            $('#modal-kelahiran').modal('show');
            $('#no_kk').val('');
            $('#name').val('');
            $('#birthplace').val('');
            $('#birthdate').val('');
            $('#gender').val('');
            $('#religion').val('');
            $('#address').val('');
            $('#dadname').val('');
            $('#momname').val('');
            $('#hidden_id').val('');
            $('#action').val('add');
            $('#button')
                .removeClass('btn-info edit')
                .addClass('btn-success add')
                .html('Tambah');
            });


            $('#form_kelahiran').on('submit', function(event) {
            event.preventDefault();
            var url = '';

            if ($('#button').hasClass('add')) {
                url = "{{ route('admin.kelahiran.add') }}";
                text = "Data berhasil ditambahkan";
            }

            if ($('#button').hasClass('edit')) {
                url = "{{ route('admin.kelahiran.update') }}";
                text = "Data berhasil diupdate";
            }
            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        // for (var count = 0; count <= data.errors.length; count++) {
                        html = data.errors[0];
                        // }
                        $('#title').addClass('is-invalid');
                        $('#message').addClass('is-invalid');
                        toastr.error(html);
                    }

                    if (data.success) {
                        Swal.fire('Success!!',text,'success' );
                        $('#title').removeClass('is-invalid');
                        $('#message').removeClass('is-invalid');
                        $('#modal-kelahiran').modal('hide');
                        $('#form_kelahiran')[0].reset();
                        $('#action').val('add');
                        $('#button')
                            .removeClass('btn-info')
                            .addClass('btn-success')
                            .val('Simpan');
                        $('#order-table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }
            });
        });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '/admin/peristiwa/kelahiran/edit/' + id,
                dataType: 'JSON',
                success: function(data) {
                    $('.modal-title').html('Edit Kelahiran');
                    $('#form-kelahiran form').attr('action', 'edit');
                    $('#no_kk').val(data.birth.no_kk);
                    $('#name').val(data.birth.name);
                    $('#birthplace').val(data.birth.birthplace);
                    $('#birthdate').val(data.birth.birthdate);
                    $('#gender').val(data.birth.gender);
                    $('#religion').val(data.birth.religion);
                    $('#address').val(data.birth.address);
                    $('#dadname').val(data.birth.dadname);
                    $('#momname').val(data.birth.momname);
                    $('#hidden_id').val(data.birth.id);
                    $('#action').val('edit');

                    $('#button')
                        .removeClass('btn-success add')
                        .addClass('btn-info edit')
                        .html('Update');
                    $('#modal-kelahiran').modal('show');
                }

            });
        });


            var delete_id;
            $(document).on('click', '.delete', function () {
                delete_id = $(this).attr('id');
                $('#confirmModal1').modal('show');
            });

            $('.delete_btn').click(function () {
                $.ajax({
                    url: '/admin/peristiwa/kelahiran/hapus/'+delete_id,
                    beforeSend: function () {
                        $('#btn-delete').text('Menghapus...');
                    }, success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal1').modal('hide');
                            $('#order-table').DataTable().ajax.reload();
                            Swal.fire('Success!!','Data berhasil dihapus','success' );
                        }, 1000);
                    }
                });
            });

        });
    </script>
@endpush            