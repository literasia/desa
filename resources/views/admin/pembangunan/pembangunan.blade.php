@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Pembangunan')
@section('title-1', 'Pembangunan')
@section('title-2', 'Pembangunan')
@section('title-3', 'Pembangunan')

@section('describ')
    Ini adalah halaman Pembangunan untuk admin
@endsection

@section('icon-l', 'icon-people')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.pembangunan.pembangunan') }}
@endsection

{{-- main content --}}
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                        <button id="add" class="btn btn-outline-primary shadow-sm"><i class="fa fa-plus"></i></button>
                        <div class="dt-responsive table-responsive">
                            <table id="order-table" class="table table-striped table-bordered nowrap shadow-sm">
                                <thead class="text-left">
                                    <tr>
                                        <!-- <th>Nis</th> -->
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Jenis Pembangunan</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
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
    @include('admin.pembangunan.modals._pembangunan')
@endsection


{{-- addons css --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link href="{{ asset('assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datedropper/css/datedropper.min.css') }}" />
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/switchery/css/switchery.min.css') }}">-->
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    
    <style>
        .btn i {
            margin-right: 0px;
        }
    </style>
@endpush

{{-- addons javascript --}}
@push('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/pages/file-upload/dropzone-amd-module.min.js') }}"></script>
    <script src="{{ asset('bower_components/datedropper/js/datedropper.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <!--
    <script src="{{ asset('bower_components/switchery/js/switchery.min.js') }}"></script>
    <script src="{{ asset('ass ets/pages/advance-elements/swithces.js') }} "></script1>
    -->
    <script>
        $(document).ready(function () {

            $('#add').on('click', function () {
               
                $('#modal-pembangunan').modal('show');
                        $('#action').val('add');
                        $('.btn-boy')
                            .removeClass('btn-info')
                            .addClass('btn-success')
                            .html('Simpan');
                            $('#form-pembangunan')[0].reset();

            });

           
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                
                ajax: {
                    url: "{{ route('admin.pembangunan.pembangunan') }}",
                },
                columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'development_name',
                    name: 'development_name'
                },
                {
                    data: 'types_name',
                    name: 'types_name'
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

            $('#form-pembangunan').on('submit', function (event) {
                event.preventDefault();

                var url = '';
                var text ='';
                if ($('#action').val() == 'add') {
                    url = "{{ route('admin.pembangunan.pembangunan') }}";
                    text = "Data berhasil ditambah";

                }

                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.pembangunan.pembangunan-update') }}";
                    text = "Data berhasil diupdate";

                }

                var formData = new FormData($('#form-pembangunan')[0]);


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
                          
                            toastr.error(html); 
                        }

                        if (data.success) {
                        Swal.fire('Success!!',text,'success' );
                        $('#modal-pembangunan').modal('hide');
                        $('#form-pembangunan')[0].reset();
                        $('#action').val('add');
                        $('.btn-boy')
                            .removeClass('btn-info')
                            .addClass('btn-success')
                            .val('Simpan');
                        $('#order-table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    },
                    error: function(errors){
                        toastr.error(errors);
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/pembangunan/pembangunan/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        console.log(data);
                        $('#action').val('edit');
                        $('#title').val(data.development[0].development_name);
                        $('#type_id').val(data.development[0].type_id);
                        $('#description').val(data.development[0].description);
                        $('#hidden_id').val(data.development[0].id);
                        $('.btn-boy')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-pembangunan').modal('show');
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
                    url: '/admin/pembangunan/pembangunan/hapus/'+user_id,
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