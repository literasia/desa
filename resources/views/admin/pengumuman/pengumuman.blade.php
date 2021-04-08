@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Pengumuman | Pengumuman')
@section('title-2', 'Pengumuman')
@section('title-3', 'Pengumuman')

@section('describ')
Ini adalah halaman Pengumuman untuk admin
@endsection

@section('icon-l', 'icon-bell')
@section('icon-r', 'icon-home')

@section('link')
{{ route('admin.pengumuman.pengumuman') }}
@endsection

{{-- main content --}}
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="card-block pt-0">
                    <button id="add" class="btn btn-outline-primary shadow-sm my-3"><i class="fa fa-plus"></i></button>
                    <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-striped nowrap shadow-sm">
                            <thead class="text-left">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Set Waktu</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tampil Pada</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-left">
                                {{-- @php
                                        $i = 1;
                                    @endphp
                                    @forelse($data as $pesan)
                                        <tr>
                                            <td>{{ $i }}</td>
                                <td>{{ $pesan->title }}</td>
                                <td>{{ $pesan->message_time }}</td>
                                <td>{{ date("Y-m-d", strtotime($pesan->created_at)) }}</td>
                                <td>{{ $pesan->start_date }}</td>
                                <td>{{ $pesan->status }}</td>
                                <td>
                                    <button type="button" data-id="{{$pesan->id}}" class="edit btn btn-mini btn-info shadow-sm">Edit</button>
                                    &nbsp;&nbsp;
                                    <button type="button" data-id="{{$pesan->id}}" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>
                                </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

{{-- Modal --}}
@include('admin.pengumuman.modals._pesan')
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
<script src="{{ asset('js/sweetalert2.min.js') }}" ></script>
<script>
    $(document).ready(function() {
        $('#order-table').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: "{{ route('admin.pengumuman.pengumuman') }}",
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'message_time',
                    name: 'message_time'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'start_date',
                    name: 'start_date'
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
            $('.modal-title').html('Tambah Pesan');
            $('#title').val('');
            $('#message').val('');
            $('#start_date').val('');
            $('#end_date').val('');
            $('#action').val('add');
            $('#button')
                .removeClass('btn-outline-success edit')
                .addClass('btn-outline-info add')
                .html('Tambah');
            $('#modal-pesan').modal('show');


        });

        // $('#start_date').dateDropper({
        //     theme: 'leaf',
        //     format: 'Y-m-d'
        // });

        // $('#end_date').dateDropper({
        //     theme: 'leaf',
        //     format: 'Y-m-d'
        // });

        $('input:radio[name="message_time"]').change(function() {
            if ($(this).is(':checked') && $(this).val() == 'Using Time') {
                $("#start_date").removeAttr('disabled', '');
                $("#end_date").removeAttr('disabled', '');
            } else {
                $("#start_date").attr('disabled', '');
                $("#end_date").attr('disabled', '');
            }
        });

        $('#form-pesan').on('submit', function(event) {
            event.preventDefault();
            var url = '';

            if ($('#button').hasClass('add')) {
                url = "{{ route('admin.pengumuman.pesan-add') }}";
                text = "Data berhasil ditambahkan";
            }

            if ($('#button').hasClass('edit')) {
                url = "{{ route('admin.pengumuman.pesan-update') }}";
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
                        $('#modal-pesan').modal('hide');
                        $('#form-pesan')[0].reset();
                        $('#action').val('add');
                        $('#button')
                            .removeClass('btn-outline-info')
                            .addClass('btn-outline-success')
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
                url: '/desa/pengumuman/pesan/' + id,
                dataType: 'JSON',
                success: function(data) {

                    $('.modal-title').html('Edit Pesan');
                    $('#form-pesan form').attr('action', 'edit');
                    $('#title').val(data.messages.title);
                    $('#message').val(data.messages.message);
                    $('#start_date').val(data.messages.start_date);
                    $('#end_date').val(data.messages.end_date);
                    $('#hidden_id').val(data.messages.id);
                    $('#action').val('edit');

                    $('#button')
                        .removeClass('btn-outline-success add')
                        .addClass('btn-outline-info edit')
                        .html('Update');
                    $('#modal-pesan').modal('show');
                }

            });
        });


        var user_id;
        $(document).on('click', '.delete', function() {
            user_id = $(this).attr('id');
            $('#ok_button').text('Hapus');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function() {
            $.ajax({
                url: '/desa/pengumuman/pesan/hapus/' + user_id,
                beforeSend: function() {
                    $('#ok_button').text('Menghapus...');
                },
                success: function(data) {
                    setTimeout(function() {
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