@extends('layouts.admin')

@section('title', 'Badan Usaha Milik Desa')
@section('title-2', 'Badan Usaha Milik Desa')
@section('title-3', 'Badan Usaha Milik Desa')

@section('describ')
    Ini adalah halaman Badan Usaha Milik Desa untuk admin
@endsection

@section('icon-l', 'icon-home')
@section('icon-r', 'icon-home')
@section('link')
    {{ route('admin.bumdes.bumdes') }}
@endsection

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
                                    <th>Nama BUMDes</th>
                                    <th>Pengelola</th>
                                    <th>No. HP</th>
                                    <th>Tahun Berdiri</th>
                                    <th>Status</th>
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
@include('admin.bumdes.modals._bumdes')
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

        $('#order-table').DataTable();

        $('#order-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.bumdes.bumdes') }}",
            },
            columns: [
            {
                data: 'nama_bumdes',
                name: 'nama_bumdes'
            },
            {
                data: 'pengelola',
                name: 'pengelola'
            },
            {
                data: 'no_hp',
                name: 'no_hp'
            },
            {
                data: 'tahun_berdiri',
                name: 'tahun_berdiri'
            },
            {
                data: 'status',
                name: 'status'
            },            
            {
                data: 'action',
                name: 'action'
            }
            ]
        });

        $('#add').on('click', function() {
            $('.modal-bumdes').html('Tambah BUMDes');
            $('.form-control').val('');
            $('#action').val('add');
            $('#hidden_id').val('');
            $('#nama_bumdes').val('');
            $('#pengelola').val('');
            $('#no_hp').val('');
            $('#tahun_berdiri').val('');
            $('#status').val('');
            $('#btn')
                .removeClass('btn-info')
                .addClass('btn-success')
                .val('Simpan');
            $('#btn-cancel')
                .removeClass('btn-outline-info')
                .addClass('btn-outline-success')
                .val('Batal');
            $('#modal-bumdes').modal('show');
        });

        $('#show').on('click', function() {
            $('.modal-bumdes').html('Lihat BUMDes');
            $('.form-control').val('');
            $('#action').val('show');
            $('#hidden_id').val('');
            $('#nama_bumdes').val('');
            $('#pengelola').val('');
            $('#no_hp').val('');
            $('#tahun_berdiri').val('');
            $('#status').val('');
            $('#foto').val('');           
            $('#btn')
                .removeClass('btn-info')
                .addClass('btn-success')
                .val('Show');
            $('#btn-cancel')
                .removeClass('btn-outline-info')
                .addClass('btn-outline-success')
                .val('Show');
            $('#modal-bumdes').modal('show');
        });

        $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: "/admin/bumdes/"+id,
                    success: function (data) {
                        $('.modal-title').html('Edit BUMDes');
                        $('.form-control').val('');
                        $('#action').val('edit');
                        $('#hidden_id').val('');
                        $('#nama_bumdes').val('');
                        $('#pengelola').val('');
                        $('#no_hp').val('');
                        $('#tahun_berdiri').val('');
                        $('#status').val('');
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-bumdes').modal('show');
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
                    url: '/admin/bumdes/destroy/'+user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Menghapus...');
                    }, success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#order-table').DataTable().ajax.reload();
                            Swal.fire('Sukses!', "BUMDes Berhasil Dihapus", 'success');
                        }, 1000);
                    }
                });
            });
    });
</script>
@endpush