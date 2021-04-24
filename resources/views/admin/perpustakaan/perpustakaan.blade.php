@extends('layouts.admin')

@section('title', 'List Peminjam')
@section('title-2', 'List Peminjam')
@section('title-3', 'List Peminjam')
@section('describ')
    Ini adalah halaman List Peminjam untuk admin
@endsection
@section('icon-l', 'icon-home')
@section('icon-r', 'icon-home')
@section('link')
    {{ route('admin.perpustakaan.perpustakaan') }}
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card glass-card d-flex justify-content-center align-items-center p-2">
            <div class=" col-xl-12 card shadow mb-0 p-0">
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-striped nowrap shadow-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Siswa</th>
                                    <th>Judul Buku</th>
                                    <th>Tipe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type='button' class='ml-2 delete btn btn-mini btn-primary shadow-sm'><i class='far fa-file-audio'></i></button>
                                    <button type='button' class='ml-2 delete btn btn-mini btn-info shadow-sm'><i class='fas fa-book'></i></button>
                                    <button type='button' class='ml-2 delete btn btn-mini btn-danger shadow-sm'><i class='far fa-file-video'></i></button>
                                </td>
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
    $('document').ready(function() {
        $('#order-table').DataTable();
    })
</script>
@endpush