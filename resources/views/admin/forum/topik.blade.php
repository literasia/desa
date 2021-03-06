@extends('layouts.admin')

@section('title', 'Forum | Topik')
@section('title-2', 'Topik')
@section('title-3', 'Topik')

@section('describ')
    Ini adalah halaman Topik untuk admin
@endsection

@section('icon-l', 'icon-home')
@section('icon-r', 'icon-home')
@section('link')
    {{ route('admin.forum.topik') }}
@endsection

{{-- main content --}}
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="card-block">
                    <button id="add" class="btn btn-outline-primary shadow-sm"><i class="fa fa-plus"></i></button>
                    <div class="dt-responsive table-responsive mt-3">
                       <table id="order-table" class="table table-striped table-bordered nowrap shadow-sm">
                            <thead>
                                <tr>
                                    <th>Topik</th>
                                    <th>Forum</th>
                                    <th>Balasan</th>
                                    <th>Penulis</th>
                                    <th>Dibuat Pada</th>
                                    <th>Postingan Terakhir</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.forum.modals._tambah-topik')
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
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datedropper/css/datedropper.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-clockpicker.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
<style>
    .btn i {
        margin-right: 0px;
    }
    .modal-dialog {
        margin-bottom: 6rem!important;
    }
</style>
@endpush

{{-- addons js --}}
@push('js')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('bower_components/datedropper/js/datedropper.min.js') }}"></script>
<script type="text/javascript">


    $('document').ready(function() {
        $('#order-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.forum.topik') }}",
            },
            columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'judul_topik',
                name: 'judul_topik'
            },
            {
                data: 'forum',
                name: 'forum'
            },
            {
                data: 'balasan',
                name: 'balasan'
            },
            {
                data: 'penulis',
                name: 'penulis'
            },
            {
                data: 'dibuat_pada',
                name: 'dibuat_pada'
            },
            {
                data: 'postingan_terakhir',
                name: 'postingan_terakhir'
            },
            {
                data: 'action',
                name: 'action'
            }
            ]
        });

        $('#add').on('click', function() {
            $('.modal-title').html('Tambah Topik');
            $('.form-control').val('');
            $('#action').val('add');
            $('#hidden_id').val('');
            $('#judul_topik').val('');
            $('#forum_id').val('');
            $('#balasan').val('');
            $('#penulis_id').val('');
            $('#dibuat_pada').val('');
            $('#status').val('');
            $('#btn')
                .removeClass('btn-info')
                .addClass('btn-success')
                .val('Tambah');
            $('#btn-cancel')
                .removeClass('btn-outline-info')
                .addClass('btn-outline-success')
                .val('Batal');
            $('#modal-soal').modal('show');
        });
    });

          

    $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/forum/topik/edit/'+id,
                    dataType: 'JSON',
                    success: function (data) {
//                        $('#action').val('edit');
//                        $('#title').val(data.name);
//                        $('#category').val(data.category);
//                        $('#content').val(data.content);
//                        $('#create_date').val(data.create_date);
//                        $('#hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-topik').modal('show');
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
                    url: '/admin/forum/topik/hapus/'+user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Menghapus...');
                    }, success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#topik-table').DataTable().ajax.reload();
                            // toastr.success('Data berhasil dihapus');
                            Swal.fire('Sukses!', 'Data berhasi dihapus!', 'success');
                        }, 1000);
                    }
                });
            });
</script>
@endpush