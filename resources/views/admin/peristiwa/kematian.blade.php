@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Peristiwa | Kematian')
@section('title-2', 'Kematian')
@section('title-3', 'Kematian')

@section('describ')
    Ini adalah halaman Kematian untuk admin
@endsection

@section('icon-l', 'icon-bell')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.peristiwa.kematian') }}
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow">            
            <div class="card-body">
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-striped table-bordered nowrap shadow-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIK</th>
                                    <th>Penduduk Meninggal</th>
                                    <th>Tanggal Kematian</th>
                                    <th>Penyebab Kematian</th>       
                                    <th>Alamat</th>        
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

{{-- Modal --}}
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
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.peristiwa.kematian') }}",
                },
                columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'deathdate',
                    name: 'deathdate'
                },
                {
                    data: 'deadcause',
                    name: 'deadcause'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });

            // var update_id = '';
            // $(document).on('click', '.update', function (e) {
            //     update_id = $(this).attr('id');
            //     $('#confirmModal2').modal('show');
            // });

            // $('.reject_btn').click(function () {
            //     $.ajax({
            //         headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         method: 'POST',
            //         data: {
            //             reject : "rejected"
            //         },
            //         url: '/admin/potensi/potensi/update/'+update_id,
            //         beforeSend: function () {
            //             $('#btn-reject').text('Mengupdate...');
            //         }, success: function (data) {
            //             setTimeout(function () {
            //                 $('#confirmModal2').modal('hide');
            //                 $('#order-table').DataTable().ajax.reload();
            //                 $('#btn-reject').text('Tolak');
            //                 Swal.fire('Success!!','Data berhasil ditolak','success' );
            //             }, 1000);
            //         }
            //     });
            // });
    
            // $('.update_btn').click(function () {
            //     $.ajax({
            //         headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         method: 'POST',
            //         url: '/admin/potensi/potensi/update/'+update_id,
            //         beforeSend: function () {
            //             $('#btn-update').text('Mengupdate...');
            //         }, success: function (data) {
            //             setTimeout(function () {
            //                 $('#confirmModal2').modal('hide');
            //                 $('#order-table').DataTable().ajax.reload();
            //                 $('#btn-update').text('Setujui');
            //                 Swal.fire('Success!!','Data berhasil diapprove','success' );
            //             }, 1000);
            //         }
            //     });
            // });


            var delete_id;
            $(document).on('click', '.delete', function () {
                delete_id = $(this).attr('id');
                
                $('#confirmModal1').modal('show');
            });

            $('.delete_btn').click(function () {
                $.ajax({
                    url: '/admin/peristiwa/kematian/hapus/'+delete_id,
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