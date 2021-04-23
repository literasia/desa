@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Peristiwa | Kematian')
@section('title-2', 'Kematian')
@section('title-3', 'Kematian')

@section('describ')
    Ini adalah halaman Kematian untuk admin
@endsection

@section('icon-l', 'fa fa-chart-bar')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.peristiwa.kematian') }}
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
                                        <th>#</th>
                                        <th>NIK</th>
                                        <th>Penduduk Meninggal</th>
                                        <th>Tanggal Kematian</th>
                                        <th>Penyebab Kematian</th>  
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>     
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
</div>

{{-- Modal --}}
@include('admin.peristiwa.modals._kematian')

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
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
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
                    data: 'action',
                    name: 'action'
                }
                ]
            });



        $('#birthdate').dateDropper({
            theme: 'leaf',
            format: 'Y-m-d'
        });

        $('#deathdate').dateDropper({
            theme: 'leaf',
            format: 'Y-m-d'
        });
            

            $('#add').on('click', function() {
            $('#modal-kematian').modal('show');
            $('.modal-title').html('Tambah Penduduk Meninggal');
            $('#form-kematian form').attr('action', 'add');
            $('#no_kk').val('');
            $('#nik').val('');
            $('#name').val('');
            $('#birthplace').val('');
            $('#birthdate').val('');
            $('#deathdate').val('');
            $('#deadcause').val('');
            $('#gender').val('');
            $('#religion').val('');
            $('#status_marriage').val('');
            $('#address').val('');
            $('#hidden_id').val('');
            $('#action').val('add');
            $('#button')
                .removeClass('btn-info edit')
                .addClass('btn-success add')
                .html('Tambah');
            });

        
            $('#form_kematian').on('submit', function(event) {
            event.preventDefault();
            var url = '';

            if ($('#button').hasClass('add')) {
                url = "{{ route('admin.kematian.add') }}";
                text = "Data berhasil ditambahkan";
            }

            if ($('#button').hasClass('edit')) {
                url = "{{ route('admin.kematian.update') }}";
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
                        $('#modal-kematian').modal('hide');
                        $('#form_kematian')[0].reset();
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
                url: '/admin/peristiwa/kematian/edit/' + id,
                dataType: 'JSON',
                success: function(data) {
                    $('.modal-title').html('Edit Penduduk Meninggal');
                    $('#form_kematian form').attr('action', 'edit');
                    $('#no_kk').val(data.death.no_kk);
                    $('#nik').val(data.death.nik);
                    $('#name').val(data.death.name);
                    $('#birthplace').val(data.death.birthplace);
                    $('#birthdate').val(data.death.birthdate);
                    $('#deathdate').val(data.death.deathdate);
                    $('#deadcause').val(data.death.deadcause);
                    $('#gender').val(data.death.gender);
                    $('#religion').val(data.death.religion);
                    $('#status_marriage').val(data.death.status_marriage);
                    $('#address').val(data.death.address);
                    $('#hidden_id').val(data.death.id);
                    $('#action').val('edit');

                    $('#button')
                        .removeClass('btn-success add')
                        .addClass('btn-info edit')
                        .html('Update');
                    $('#modal-kematian').modal('show');
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