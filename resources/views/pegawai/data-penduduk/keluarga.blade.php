@extends('layouts.pegawai')

{{-- config 1 --}}
@section('title', 'Data Penduduk | Keluarga')
@section('title-2', 'Keluarga')
@section('title-3', 'Keluarga')

@section('describ')
    Ini adalah halaman Keluarga untuk pegawai
@endsection

@section('icon-l', 'fa fa-users')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('pegawai.data-penduduk.keluarga') }}
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
                                        <th>No. KK</th>
                                        <th>Kepala Keluarga</th>
                                        <th>Alamat</th>
                                        <th>Desa/Kelurahan</th>
                                        <th>Aplikasi</th>
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

{{-- Modal --}}
@include('pegawai.data-penduduk.modals._keluarga')
@endsection

{{-- addons css --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
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
                $('#modal-keluarga').modal('show');
            });
        });
    </script>
@endpush
