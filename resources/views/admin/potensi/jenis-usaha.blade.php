@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Potensi Desa | Jenis Usaha')
@section('title-2', 'Jenis Usaha')
@section('title-3', 'Jenis Usaha')

@section('describ')
    Ini adalah halaman Jenis Usaha untuk admin
@endsection

@section('icon-l', 'fa fa-chart-line')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.potensi.jenis-usaha') }}
@endsection

{{-- main content --}}
@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                        <form id="form-status">
                        @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="jenis_usaha">Jenis Usaha</label>
                                        <input type="text" name="jenis_usaha" id="jenis_usaha" class="form-control form-control-sm" placeholder="Jenis Usaha">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="hidden_id" id="hidden_id">
                                    <input type="hidden" id="action" val="add">
                                    <input type="submit" class="btn btn-sm btn-success" value="Simpan" id="btn">
                                    <button type="reset" class="reset btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card glass-card d-flex justify-content-center align-items-center p-2">
                <div class=" col-xl-12 card shadow mb-0 p-0">
                    <div class="card-body">
                        <div class="card-block p-2">
                            <div class="dt-responsive table-responsive">
                                <table id="order-table" class="table table-striped nowrap shadow-sm">
                                    <thead class="text-left">
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Usaha</th>
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
                    <button type="button" class=" btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
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
    <script src="{{ asset('js/sweetalert2.min.js') }}" ></script>
    <script>
         $(document).ready(function () {
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.potensi.jenis-usaha') }}",
                },
                columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'business_type',
                    name: 'business_type'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });

            $('.reset').on('click', function(e) {
            e.preventDefault();
            $('#jenis_usaha').removeClass('is-invalid');
                            $('#form-status')[0].reset();
            $('#action').val('add');
            $('#btn')
            .removeClass('btn-info')
                            .addClass('btn-success')
                .val('Simpan');
        })

        $('#form-status').on('submit', function (event) {
                event.preventDefault();
                var url = '';
                var text = "Data sukses ditambahkan";
                if ($('#action').val() == 'add') {
                    url = "{{ route('admin.potensi.jenis-usaha') }}";
                    text = "Data sukses ditambahkan";
                   
                }

                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.potensi.jenis-usaha.update') }}";
                    text = "Data sukses diupdate";
                }

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'JSON',
                    data: $(this).serialize(),
                    success: function (data) {
                        var html = '';
                        if (data.errors) {
                            // for (var count = 0; count <= data.errors.length; count++) {
                            html = data.errors[0];
                            // 
                            $('#jenis_usaha').addClass('is-invalid');
                            toastr.error(html);
                        }

                        if (data.success) {
                            Swal.fire('Success!!',text,'success' );  
                            $('#jenis_usaha').removeClass('is-invalid');
                            $('#form-status')[0].reset();
                            $('#action').val('add');
                            $('#btn')
                            .removeClass('btn-info')
                            .addClass('btn-success')
                            .val('Simpan');
                            $('#order-table').DataTable().ajax.reload();
                        }
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/potensi/jenis-usaha/edit/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('#jenis_usaha').val(data.data.business_type);
                        $('#hidden_id').val(data.data.id);
                        $('#action').val('edit');
                        $('#btn')
                            .removeClass('btn-outline-success')
                            .addClass('btn-info')
                            .val('Update');
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
                    url: '/admin/potensi/jenis-usaha/hapus/'+user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Menghapus...');
                    }, success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#order-table').DataTable().ajax.reload();
                            Swal.fire('Success!!','Data berhasil dihapus','success' );
                        }, 1000);
                    }
                });
            });
         });
    </script>
@endpush
