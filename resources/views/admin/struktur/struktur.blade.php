@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Struktur Desa | Struktur Desa')
@section('title-2', 'Struktur Desa')
@section('title-3', 'Struktur Desa')

@section('describ')
    Ini adalah halaman Struktur Desa untuk admin
@endsection

@section('icon-l', 'fa fa-project-diagram')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.struktur.struktur') }}
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
                                            <th>Jabatan</th>
                                            <th>Golongan</th>
                                            <th>Status</th>
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
    </div>
    {{-- Modal --}}
    @include('admin.struktur.modals._struktur')

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
@endsection

{{-- addons css --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
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
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#start_date').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });
            $('#end_date').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });
        });
    </script>

    
    <script>
        $(document).ready(function () {
            // get employee Json
            function getEmployeData() {
                $.ajax({
                    url: '/admin/struktur/get_employee',
                    dataType: 'JSON',
                    success: function (employees) {
                        employees.forEach(employee => {    
                            $("#employee-id").append(new Option(`${employee.name}`, `${employee.id}`));
                        });
                    }
                });
            }
            // get positions json
            function getPositionData() {
                $.ajax({
                    url: '/admin/struktur/get_position',
                    dataType: 'JSON',
                    success: function (positions) {
                        positions.forEach(position => {    
                            $("#position-id").append(new Option(`${position.name}`, `${position.id}`));
                        });
                    }
                });
            }
            // get village structures
            function getVillageStructure(){
                $.ajax({
                    url: '/admin/struktur/get_village_structure',
                    dataType: 'JSON',
                    success: function (villageStructures) {
                        if (villageStructures.length < 1) {
                            $('#parent-id-group').css('display', 'none');
                        }else{
                            villageStructures.forEach(villageStructure => {    
                                $("#parent-id").append(new Option(`${villageStructure.employee.name} - ${villageStructure.position.name}`, `${villageStructure.id}`));
                            });   
                        }
                    }
                });
            }
            getEmployeData();
            getVillageStructure();
            getPositionData();
            // Show Modal
            $('#add').on('click', function () {
                $('.modal-title').html('Tambah Struktur Desa');
                $('#action').val('add');                        
                $('#employee-id').val('');
                $('#position-id').val('');
                $('#status').val('');
                $('#level').val('');
                $('#parent-id').val('');
                $('#description').val('');
                $('#btn')
                    .removeClass('btn-info')
                    .addClass('btn-success')
                    .val('Simpan');
                $('#modal-struktur').modal('show');
            });
            // Show DataTables
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.struktur.struktur') }}",
                },
                columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'employee_id',
                    name: 'employee_id'
                },
                {
                    data: 'position_id',
                    name: 'position_id'
                },
                {
                    data: 'level',
                    name: 'level'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });
            // Event Submit
            $('#form-struktur').on('submit', function (event) {
                event.preventDefault();
                let url = '';
                if ($('#action').val() == 'add') {
                    url = "{{ route('admin.struktur.struktur.store') }}";
                }
                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.struktur.struktur.update') }}";
                }
                let formData = new FormData($('#form-struktur')[0]);
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    success: function (data) {
                        var html = ''
                        // If has Errors
                        if (data.errors) {
                            data.errors.employee_id ? $('#employee-id').addClass('is-invalid') : $('#employee_id').removeClass('is-invalid')
                            data.errors.position_id ? $('#position-id').addClass('is-invalid') : $('#position_id').removeClass('is-invalid')
                            data.errors.level ? $('#level').addClass('is-invalid') : $('#level').removeClass('is-invalid')
                            data.errors.status ? $('#status').addClass('is-invalid') : $('#status').removeClass('is-invalid')
                            data.errors.description ? $('#description').addClass('is-invalid') : $('#description').removeClass('is-invalid')
                            toastr.error(data.error);
                        }
                        if (data.success) {
                            if ($('#action').val() == 'add') {
                                Swal.fire('Sukses!', 'Data berhasi ditambahkan!', 'success');
                            }
                            if ($('#action').val() == 'edit') {
                                Swal.fire('Sukses!', 'Data berhasi diupdate!', 'success');
                            }
                            Swal.fire('Sukses!', 'Data berhasil ditambahkan!', 'success');
                            $('#modal-struktur').modal('hide');
                            $('#parent-id-group').css('display', 'block');
                            $('#parent-id')
                                .find('option')
                                .remove()
                                .end()
                                .append('<option value="">Pilih</option>')
                                .val('Pilih');
                            getVillageStructure();
                            $('#employee-id').removeClass("is-invalid");
                            $('#position-id').removeClass("is-invalid");
                            $('#status').removeClass("is-invalid");
                            $('#level').removeClass("is-invalid");
                            $('#parent-id').removeClass("is-invalid");
                            $('#description').removeClass("is-invalid");
                            $('#form-struktur')[0].reset();
                            $('#action').val('add');
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
            // Get data show to inputs
            $(document).on('click', '.edit', function () {
                let id = $(this).attr('id');
                $.ajax({
                    url: '/admin/struktur/struktur/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('.modal-title').html('Edit Struktur Desa');
                        $('#action').val('edit');                        
                        $('#employee-id').val(data.employee_id);
                        $('#position-id').val(data.position_id);
                        $('#status').val(data.status);
                        $('#level').val(data.level);
                        $('#parent-id').val(data.parent_id);
                        $('#description').val(data.description);
                        $('#hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-struktur').modal('show');
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
                    url: '/admin/struktur/struktur/hapus/'+user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Menghapus...');
                    }, success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#order-table').DataTable().ajax.reload();
                            $('#parent-id')
                                .find('option')
                                .remove()
                                .end()
                                .append('<option value="">Pilih</option>')
                                .val('Pilih');
                            getVillageStructure();
                            // toastr.success('Data telah berhasil dihapus');                            
                            Swal.fire('Sukses!', 'Data berhasil dihapus!', 'success');
                        }, 1000);
                    }
                });
            });
        });
    </script>
@endpush

