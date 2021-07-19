@extends('layouts.pegawai')

@section('title', 'BUMDes | Badan Usaha Milik Desa')
@section('title-2', 'Badan Usaha Milik Desa')
@section('title-3', 'Badan Usaha Milik Desa')

@section('describ')
    Ini adalah halaman Badan Usaha Milik Desa untuk pegawai
@endsection

@section('icon-l', 'icon-home')
@section('icon-r', 'icon-home')
@section('link')
    {{ route('pegawai.bumdes.bumdes') }}
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
                                    <th>Deskripsi</th>
                                    <th>No. HP</th>
                                    <th>Email Bumdes</th>
                                    <th>Alamat Bumdes</th>
                                    <th>ADRT</th>
                                    <th>Omzet Tahun Lalu</th>
                                    <th>Keuntungan Tahun Lalu</th>
                                    <th>Tahun Berdiri</th>
                                    <th>Jumlah Pegawai</th>
                                    <th>Kode Registrasi</th>
                                    <th>Status</th>
                                    <th>Foto Bumdes</th>
                                    <th>Laporan Keuangan Akhir Tahun</th>
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
@include('pegawai.bumdes.modals._bumdes')
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
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/select2/css/select2.min.css') }}">
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

    .select2-container--default .select2-selection--single .select2-selection__rendered {
            background-color: transparent;
            padding-top: 0px;
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
<script src="{{ asset('bower_components/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">

    $('document').ready(function() {
        $('#order-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pegawai.bumdes.bumdes') }}",
            },
            columns: [
            {
                data: 'bumdes_name',
                name: 'bumdes_name'
            },
            {
                data: 'employee_id',
                name: 'employee_id'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'no_whatsapp',
                name: 'no_whatsapp'
            },
            {
                data: 'bumbdes_email',
                name: 'bumbdes_email'
            },
            {
                data: 'bumdes_address',
                name: 'bumdes_address   '
            },
            {
                data: 'adrt',
                name: 'adrt'
            },
            {
                data: 'earnings_last_year',
                name: 'earnings_last_year'
            },
            {
                data: 'profits_last_year',
                name: 'profits_last_year'
            },
            {
                data: 'since_year',
                name: 'since_year'
            },
            {
                data: 'number_of_employee',
                name: 'number_of_employee'
            },
            {
                data: 'registration_code',
                name: 'registration_code'
            },
            {
                data: 'status',
                name: 'status'
            },         
            {
                data: 'bumdes_image',
                name: 'bumdes_image'
            },
            {
                data: 'financial_report',
                name: 'financial_report'
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
            $('#citizen').val('{{$name}}');
            $('#no_hp').val('');
            $('#tahun_berdiri').val('');
            $('#status').val('');
            $('#btn')
                .removeClass('btn-info')
                .addClass('btn-success')
                .val('add');
            $('#btn-cancel')
                .removeClass('btn-outline-info')
                .addClass('btn-outline-success')
                .val('Batal');
            $('#modal-bumdes').modal('show');
        });

        // $('#show').on('click', function() {
        //     $('.modal-bumdes').html('Lihat BUMDes');
        //     $('.form-control').val('');
        //     $('#action').val('show');
        //     $('#hidden_id').val('');
        //     $('#nama_bumdes').val('');
        //     $('#pengelola').val('');
        //     $('#no_hp').val('');
        //     $('#tahun_berdiri').val('');
        //     $('#status').val('');
        //     $('#foto').val('');           
        //     $('#btn')
        //         .removeClass('btn-info')
        //         .addClass('btn-success')
        //         .val('Show');
        //     $('#btn-cancel')
        //         .removeClass('btn-outline-info')
        //         .addClass('btn-outline-success')
        //         .val('Show');
        //     $('#modal-bumdes').modal('show');
        // });
        $('.basic-single').select2();

        $('#form-bumdes').on('submit', function(event) {
            event.preventDefault();
            var url = '';
            var text = '';

            if ($('#action').val() == 'add') {
                url = "{{ route('pegawai.bumdes.bumdes') }}";
                text = "Data berhasil ditambahkan";
            }

            if ($('#action').val() == 'edit') {
                url = "{{ route('pegawai.bumdes.update') }}";
                text = "Data berhasil diupdate";
            }

            var formData = new FormData($('#form-bumdes')[0]);
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        // for (var count = 0; count <= data.errors.length; count++) {
                        html = data.errors[0];
                        // }
                        toastr.error(html);
                    }
                    if (data.success) {
                        Swal.fire('Success!!',text,'success' );
                        $('#modal-bumdes').modal('hide');
                        $('#form-bumdes')[0].reset();
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

        $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: "/pegawai/bumdes/edit/"+id,
                    success: function (data) {
                        console.log(data)
                        $('.modal-title').html('Edit BUMDes');
                        $('#action').val('edit');
                        $('#hidden_id').val(data[0].id);
                        $('#bumdes_name').val(data[0].bumdes_name);
                        $('#citizen').val(data[0].employee.name);
                        $('#no_whatsapp').val(data[0].no_whatsapp);
                        $('#since_year').val(data[0].since_year);
                        $('#status').val(data[0].status);
                        $('#description').val(data[0].description);
                        $('#registration_code').val(data[0].registration_code);
                        $('#bumdes_email').val(data[0].bumbdes_email);
                        $('#bumdes_address').val(data[0].bumdes_address);
                        $('#number_of_employee').val(data[0].number_of_employee);
                        $('#adrt').val(data[0].adrt);
                        $('#earnings_last_year').val(data[0].earnings_last_year);
                        $('#profits_last_year').val(data[0].profits_last_year);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('edit');
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
                    url: '/pegawai/bumdes/hapus/'+user_id,
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