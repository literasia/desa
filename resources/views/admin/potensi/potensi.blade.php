@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Potensi Desa | Potensi Desa')
@section('title-2', 'Potensi Desa')
@section('title-3', 'Potensi Desa')

@section('describ')
    Ini adalah halaman Potensi Desa untuk admin
@endsection

@section('icon-l', 'icon-chart')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.potensi.potensi') }}
@endsection

{{-- main content --}}
@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block pt-0">
                        <div class="dt-responsive table-responsive">
                            <table id="order-table" class="table table-striped nowrap shadow-sm">
                                <thead class="text-left">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Usaha</th>
                                        <th>Kategori Usaha</th>
                                        <th>Jenis Usaha</th>
                                        <th>Pemilik Usaha</th>
                                        <th>Alamat Usaha</th>
                                        <th>No. Telp</th>
                                        <th>No. WhatsApp</th>
                                        <th>Foto KTP</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-left">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="" class="text-success"><i class="fa fa-check-circle mr-2"></i>Uploaded</a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-secondary btn-sm">Approve</a>
                                            <!-- <a href="" class="btn btn-success btn-sm">Approved</a> -->
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <style>
        .btn i {
            margin-right: 0px;
        }

        .btn-secondary {
            background-color: #cecece;
            border-color: #cecece;
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
    <script src="{{ asset('js/sweetalert2.min.js') }}" ></script>   
    <script>
        $(document).ready(function () {
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.potensi.potensi') }}",
                },
                columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'business_name',
                    name: 'business_name'
                },
                {
                    data: 'business_category',
                    name: 'business_category'
                },
                {
                    data: 'business_type',
                    name: 'business_type'
                },
                {
                    data: 'business_owner',
                    name: 'business_owner'
                },
                {
                    data: 'business_address',
                    name: 'business_address'
                },
                {
                    data: 'no_phone',
                    name: 'no_phone'
                },
                {
                    data: 'no_whatsapp',
                    name: 'no_whatsapp'
                },
                {
                    data: 'image_ktp',
                    name: 'image_ktp'
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

            var update_id = '';
            $(document).on('click', '.update', function (e) {
                update_id = $(this).attr('id');
                console.log(update_id);
               
               
                $('#confirmModal2').modal('show');
            });

    
            $('.update_btn').click(function () {
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    url: '/admin/potensi/potensi/update/'+update_id,
                    beforeSend: function () {
                        $('#btn-update').text('Mengupdate...');
                    }, success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal2').modal('hide');
                            $('#order-table').DataTable().ajax.reload();
                            Swal.fire('Success!!','Data berhasil diapprove','success' );
                        }, 1000);
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
                    url: '/admin/potensi/hapus/'+delete_id,
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
