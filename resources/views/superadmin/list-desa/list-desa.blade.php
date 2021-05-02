@extends('layouts.superadmin')

@section('title', 'List Desa | List Desa')
@section('title-2', 'List Desa')
@section('title-3', 'List Desa')
@section('describ')
    Ini adalah halaman List Desa untuk superadmin
@endsection
@section('icon-l', 'fa fa-mountain')
@section('icon-r', 'icon-home')
@section('link')
    {{ route('superadmin.list-desa.list-desa') }}
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow">
            <div class="card-header">
                <h5>List Desa</h5>
            </div>
            <div class="card-body">
                <button id="add" class="btn btn-outline-primary shadow-sm"><i class="fa fa-plus"></i></button>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-striped table-bordered nowrap shadow-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Desa</th>
                                    <th>Actions</th>
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
@include('superadmin.list-desa.modals._tambah-desa')

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
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/select2/css/select2.min.css') }}" />
    <style>
        .btn i {
            margin-right: 0px;
        }
        .select2-container {
            width: 100% !important;
            padding: 0;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            background-color: transparent;
            color: #000;
            padding: 0px 30px 0px 10px;
        }
        .checkbox {
            position: absolute;
            left: 15px;
        }
        .add-ons-icon {
            font-size: 16pt!important;
        }
    </style>
@endpush

{{-- addons js --}}
@push('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#add').on('click', function () {
                $('#modal-desa').modal('show');
            });

            $('#village_list').select2({
                ajax: {
                    url: function(params){
                        return "http://beta-desa.literasia.co.id/api/village/search/"+params.term
                    },
                    dataType: 'json',
                    delay: 250,

                    processResults: function (data, params) {
                        return {
                            results: data.data,
                        };
                    },
                    cache: true
                },
                placeholder: 'Cari Desa',
                minimumInputLength: 5,
                language: {
                    inputTooShort: function() {
                        return 'Masukan minimal 5 karakter';
                    }
                },
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            function formatRepo (repo) {
                if (repo.loading) {
                    return repo.text;
                }


                var $container = $(
                    "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__meta'>" +
                        "<div class='select2-result-repository__title'></div>" +
                        "<div class='select2-result-repository__kec'></div>" +
                        "<div class='select2-result-repository__kab'></div>" +
                    "</div>" +
                    "</div>"
                );

                $container.find(".select2-result-repository__title").text(repo.name);
                $container.find(".select2-result-repository__kec").text(repo.district.name);
                $container.find(".select2-result-repository__kab").text(repo.district.regency.name);

                return $container;
            }

            function formatRepoSelection (repo) {
                return repo.name || repo.text;
            }

            // Show Modal
            $('#add').on('click', function () {
            $('.modal-title').html('Tambah Desa dan Admin');
            $('#action').val('add');
            $('#username').val('');
            $('#username').prop("disabled", false);
            $('#password').val('');
            $('#password-confirmation').val('');
            $('#password-group').css('display', 'block');
            $('#password-confirmation-group').css('display', 'block');
            $('#btn')
                .removeClass('btn-info')
                .addClass('btn-success')
                .val('Simpan');
            $('#modal-desa').modal('show');

            });
            // Show DataTables
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('superadmin.list-desa.list-desa') }}",
                },
                columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'village_name',
                    name: 'village_name'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                ]
            });
            // Event Submit
            $('#form-desa').on('submit', function (event) {
                event.preventDefault();
                let url = '';
                if ($('#action').val() == 'add') {
                    url = "{{ route('superadmin.list-desa.list-desa.store') }}";
                }
                if ($('#action').val() == 'edit') {
                    url = "{{ route('superadmin.list-desa.list-desa.update') }}";
                }
                let formData = new FormData($('#form-desa')[0]);

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var html = ''
                        // If has Errors
                        if (data.errors) {
                            data.errors.username ? $('#username').addClass('is-invalid') : $('#username').removeClass('is-invalid')
                            data.errors.password ? $('#password').addClass('is-invalid') : $('#password').removeClass('is-invalid')
                            if (data.errors.password == "The password confirmation does not match.") {
                                $('#password_confirmation').addClass('is-invalid');
                                $('#password-help').css('display', 'block')
                            }else{
                                $('#password_confirmation').removeClass('is-invalid');
                                $('#password-help').css('display', 'none')
                            }
                            toastr.error(data.error);
                        }

                        // if passed
                        if (data.success) {
                            Swal.fire(
                            'Sukses!',
                            'Data berhasil ditambahkan!',
                            'success'
                            )
                            $('#modal-desa').modal('hide');
                            $('#username').removeClass('is-invalid');
                            $('#password').removeClass('is-invalid');
                            $('#password_confirmation').removeClass('is-invalid');
                            $('#form-desa')[0].reset();
                            $('#action').val('add');
                            $('#btn')
                                .val('Simpan');
                            $('#order-table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                });
            });
            // Get datas show on inputs
            $(document).on('click', '.edit', function () {
                let id = $(this).attr('id');
                $.ajax({
                    url: '/superadmin/list-desa/list-desa/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('.modal-title').html('Edit Admin Desa');
                        $('#action').val('edit');
                        $('#username').prop("disabled", true);
                        $('#username').val(data?.user?.username);
                        for (const d in data?.addon) {
                           if(d.indexOf("_id") === -1 && d.indexOf("_at") === -1 && d !== "id"){
                               if(data.addon[d]){
                                $(`input[name='x-addon-${d}']`).each( function () {
                                    $(this).attr("checked", true);;
                                });
                               }else{
                                $(`input[name='x-addon-${d}']`).each( function () {
                                    $(this).attr("checked", false);;
                                });
                               }
                           }
                        }

                        $('#label_password').text("Password Baru");
                        $('#label_password2').text("Konfirmasi Password Baru");
                        $('#village_id').val(data.user.village_id);
                        $('#hidden_id').val(data.user.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-desa').modal('show');
                    }
                });
            });
            // Even Delete
            let user_id;
            $(document).on('click', '.delete', function () {
                user_id = $(this).attr('id');
                $('#ok_button').text('Hapus');
                $('#confirmModal').modal('show');
            });
            $('#ok_button').click(function () {
                $.ajax({
                    url: '/superadmin/list-desa/list-desa/hapus/'+user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Menghapus...');
                    }, success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#order-table').DataTable().ajax.reload();
                            Swal.fire('Sukses!', 'Data berhasil dihapus!', 'success');
                        }, 1000);
                    }
                });
            });


         });

    </script>
@endpush
