@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Slider | Slider')
@section('title-2', 'Slider')
@section('title-3', 'Slider')

@section('describ')
    Ini adalah halaman slider untuk admin
@endsection

@section('icon-l', 'icon-list')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.slider.slider') }}
@endsection

{{-- main content --}}
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                        <button id="add" class="btn btn-outline-primary shadow-sm"><i class="fa fa-plus"></i></button>
                        <div class="dt-responsive table-responsive mt-3">
                            <table id="order-table" class="table table-striped nowrap shadow-sm">
                                <thead class="text-left">
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Keterangan</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Kabupaten</th>
                                        <th>Sekolah</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-left">
                                    <tr>
                                        <td><img src="" width="100px"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{ asset('bower_components/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datedropper/css/datedropper.min.css') }}" />
    <style>
        .btn i {
            margin-right: 0px;
        }

        .select2-container {
            width: 100% !important;
            padding: 0;
        }
    </style>
@endpush

{{-- addons js --}}
@push('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Select 2 js -->
    <script type="text/javascript" src="{{ asset('bower_components/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('bower_components/datedropper/js/datedropper.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#order-table').DataTable();

            $('#add').on('click', function () {
                $('#modal-slider').modal('show');
            });

            $('#sekolah').select2();

            $('#start_date').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });

            $('#end_date').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });

        });
    </script>
@endpush