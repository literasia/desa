@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Jenis Lembaga')
@section('title-1', 'Jenis Lembaga')
@section('title-2', 'Jenis Lembaga')
@section('title-3', 'Jenis Lembaga')

@section('describ')
    Ini adalah halaman Jenis Lembaga untuk admin
@endsection

@section('icon-l', 'icon-people')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.lembagadesa.jenislembaga') }}
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
                                        <th>No.</th>
                                        <th>Jenis Lembaga</th>
                                        <th>Visi Misi</th>
                                        <th>Logo</th>
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
    <div iv id="confirmModal" class="modal fade" role="dialog">
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
    @include('admin.lembagadesa.modals._jenislembaga')
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
    <script src="{{ asset('js/sweetalert2.min.js') }}" ></script>
    <!--
    <script src="{{ asset('bower_components/switchery/js/switchery.min.js') }}"></script>
    <script src="{{ asset('ass ets/pages/advance-elements/swithces.js') }} "></script1>
    -->
    <script>
        $(document).ready(function () {

            $('#add').on('click', function () {
               
                $('#modal-jenislembaga').modal('show');
                        $('#action').val('add');
                        $('.btn-boy')
                            .removeClass('btn-info')
                            .addClass('btn-success')
                            .html('Simpan');
                            $('#form_jenislembaga')[0].reset();

            });

            // $('#create_date').dateDropper({
            //     theme: 'leaf',
            //     format: 'd-m-Y'
            // });

            // $('#order-table').DataTable();

            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                
                ajax: {
                    url: "{{ route('admin.lembagadesa.jenislembaga') }}",
                },
                columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'community_name',
                    name: 'community_name'
                },
                {
                    data: 'visionandmission',
                    name: 'visionandmission'
                },
                {
                    data: 'logo',
                    name: 'logo'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });

            $('#form_jenislembaga').on('submit', function (event) {
                event.preventDefault();

                var url = '';
                var text ='';
                if ($('#action').val() == 'add') {
                    url = "{{ route('admin.lembagadesa.jenislembaga') }}";
                    text = "Data berhasil ditambah";

                }

                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.lembagadesa.jenislembaga-update') }}";
                    text = "Data berhasil diupdate";

                }

                var formData = new FormData($('#form_jenislembaga')[0]);
                console.log(formData);

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
                            $('#community_name').addClass('is-invalid');
                            $('#vm').addClass('is-invalid');
                            toastr.error(html);
                            $('#button').prop('disabled', false);
                        }

                        if (data.success) {
                        Swal.fire('Success!!',text,'success' );
                        $('#modal-jenislembaga').modal('hide');
                        $('#form_jenislembaga')[0].reset();
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
                        $('#button').prop('disabled', false);
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/lembagadesa/jenislembaga/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('#action').val('edit');
                        $('#community_name').val(data.type.community_name);
                        $('#vm').val(data.type.visionandmission);
                        $('#hidden_id').val(data.type.id);
                        $('.btn-boy')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-jenislembaga').modal('show');
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
                    url: '/admin/lembagadesa/jenislembaga/hapus/'+user_id,
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
