@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Lembaga Desa')
@section('title-1', 'Lembaga Desa')
@section('title-2', 'Lembaga Desa')
@section('title-3', 'Lembaga Desa')

@section('describ')
    Ini adalah halaman Lembaga Desa untuk admin
@endsection

@section('icon-l', 'icon-people')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.lembagadesa.lembagadesa') }}
@endsection

{{-- main content --}}
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                        <button id="add" class="btn btn-outline-primary shadow-sm"><i class="fa fa-plus"></i></button>

                        <!-- <form action="" class="mt-5 mb-5">
                            <div class="form-group">
                                <label for="select-lembaga">Pilih Lembaga</label>
                                <select name="select-lembaga" id="select-lembaga" class="form-control form-control-sm">
                                        <option value="">Pilih</option>
                                        @foreach($type as $t)
                                        <option value="{{$t->id}}">{{$t->community_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </form> -->
                        <div class="dt-responsive table-responsive">
                            <table id="order-table" class="table table-striped table-bordered nowrap shadow-sm">
                                <thead class="text-left">
                                    <tr>
                                        <th>No.</th>
                                        <th>Jenis Lembaga</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jabatan</th>                                        
                                        <th>Tanggal Masuk</th>
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
    @include('admin.lembagadesa.modals._lembagapenduduk')
    @include('admin.lembagadesa.modals._lembagadesa')
    @include('admin.lembagadesa.modals._lembaga')
    
@endsection

{{-- addons css --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link href="{{ asset('assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datedropper/css/datedropper.min.css') }}" />
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/switchery/css/switchery.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <style>
        .btn i {
            margin-right: 0px;
        }

        .select2-container {
            width: 100%;
            
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            background-color: transparent;
            padding-top: 0px;
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
    <script src="{{ asset('bower_components/select2/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}" ></script>

    <script>
        $(document).ready(function () {
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                
                ajax: {
                    url: "{{ route('admin.lembagadesa.lembagadesa') }}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'position',
                    name: 'position'
                },
                {
                    data: 'entrydate',
                    name: 'entrydate'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });


            $('#add').on('click', function(){
                $('#modal-lembagadesa').modal('show');
                $('#form_lembagadesa')[0].reset();
            });

            $('#daftar').on('click', function(){
                $('#modal-lembagadesa').modal('hide');
                $('#modal-lembagapenduduk').modal('show');
                
            });

            $('.basic-single').select2();

            $('#start_date').dateDropper({
            theme: 'leaf',
            format: 'Y-m-d'
             });

             $('#form_lembagadesa').on('submit', function (event) {
                event.preventDefault();

                var url = '';
                var text ='';
                if ($('#action').val() == 'add') {
                    url = "{{ route('admin.lembagadesa.lembagadesa') }}";
                    text = "Data berhasil ditambah";

                }

                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.lembagadesa.lembagadesa-update') }}";
                    text = "Data berhasil diupdate";

                }

                var formData = new FormData($('#form_lembagadesa')[0]);
                console.log(formData);

               

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
                            $('#position').addClass('is-invalid');
                            $('#lembaga').addClass('is-invalid');
                            $('#start_date').addClass('is-invalid');
                            toastr.error(html);
                            
                        }

                        if (data.success) {
                        Swal.fire('Success!!',text,'success' );
                        $('#modal-lembagadesa').modal('hide');
                        $('#form_lembagadesa')[0].reset();
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

            $('#form_penduduk').on('submit', function (event) {
                event.preventDefault();
                url = "{{ route('admin.lembagadesa.lembagadesa-penduduk') }}";
                text = "Data berhasil ditambah";
                var formData = new FormData($('#form_penduduk')[0]);

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
                            $('#position').addClass('is-invalid');
                            $('#lembaga').addClass('is-invalid');
                            $('#start_date').addClass('is-invalid');
                            toastr.error(html);
                            
                        }

                        if (data.success) {
                        Swal.fire('Success!!',text,'success' );
                        $('#modal-lembagadesa').modal('hide');
                        $('#form_lembagadesa')[0].reset();
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
                    url: '/admin/lembagadesa/lembagadesa/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        
                        $('#action').val('edit');
                    
                        $('#name').val(data.community[0].user_id);
                        $('#position').val(data.community[0].position);
                        $('#jenis-lembaga').val(data.community[0].com_id);
                        $('#start_date').val(data.community[0].entrydate);
                        $('#hidden_id').val(data.community[0].id);
                        $('.btn-boy')
                            .removeClass('btn-success')
                            .addClass('btn-danger')
                            .val('Update');
                        $('#modal-lembagadesa').modal('show');
                    }
                });
            });

            // $(document).on('change', '#select-lembaga', function () {
            //     var id = $('#select-lembaga').val();
            //     $.ajax({
            //         url: '/admin/lembagadesa/lembagadesa/view-lembaga/'+id,
            //         dataType: 'JSON',
            //         success: function (data) {
            //             console.log(data);
            //             $('.modal-title').html(data.community[0].community_name);
            //             $('.modal-body').html(
            //             data.community.forEach(function(d){
            //                console.log(d);
            //                `<div>posisi</div>`
            //             })
            //                 )
                       
                            
            
                        
            //             $('#modal-lembaga').modal('show');
            //         }
            //     });
            // });

            var user_id;
            $(document).on('click', '.delete', function () {
                user_id = $(this).attr('id');
                $('#ok_button').text('Hapus');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function () {
                $.ajax({
                    url: '/admin/lembagadesa/lembagadesa/hapus/'+user_id,
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
        })
    </script>
@endpush
