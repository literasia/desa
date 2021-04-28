@extends('layouts.superadmin')

@section('title', 'Add-ons | Add-ons')
@section('title-2', 'Add-ons')
@section('title-3', 'Add-ons')
@section('describ')
    Ini adalah halaman Add-ons untuk superadmin
@endsection
@section('icon-l', 'icon-home')
@section('icon-r', 'icon-home')
@section('link')
    {{ route('superadmin.add-ons.add-ons') }}
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow">
            <div class="card-header">
                <h5>Add-ons</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-primary">Pilih desa terlebih dahulu.</div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                    <select name="" id="pilih" class="form-control form-control-sm" required>
                        <option value="">-- Desa --</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="container px-5 text-center mt-4">
                    <div class="row">
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-home fa-2x mb-2"></i></span>
                            <h6>Dasboard</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-users fa-2x mb-2"></i></span>
                            <h6>Data Penduduk</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-project-diagram fa-2x mb-2"></i></span>
                            <h6>Struktur Desa</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-id-badge fa-2x mb-2"></i></span>
                            <h6>Profil Desa</h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-archive fa-2x mb-2"></i></span>
                            <h6>Administrasi Desa</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-chart-line fa-2x mb-2"></i></span>
                            <h6>Potensi Desa</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-newspaper fa-2x mb-2"></i></span>
                            <h6>Berita</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-images fa-2x mb-2"></i></span>
                            <h6>Slider</h6>
                        </div>
                    </div>

                    <div class="row">
                       <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-clipboard-list fa-2x mb-2"></i></span>
                            <h6>Absensi</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-chart-bar fa-2x mb-2"></i></span>
                            <h6>Peristiwa</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-map-marker-alt fa-2x mb-2"></i></span>
                            <h6>Wisata Desa</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-calendar fa-2x mb-2"></i></span>
                            <h6>Kalender</h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-bell fa-2x mb-2"></i></span>
                            <h6>Pengumuman</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-bullhorn fa-2x mb-2"></i></span>
                            <h6>Kampanye</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-list-alt fa-2x mb-2"></i></span>
                            <h6>Referensi</h6>
                        </div>
                        <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-book-open fa-2x mb-2"></i></span>
                            <h6>Perpustakaan</h6>
                        </div>
                    </div>

                    <div class="row ">
                       <div class="col-6 col-md-3 my-2 py-2 card rounded">
                            <input type="checkbox" name="" checked="" class="d-block checkbox">
                            <span><i class="fa fa-comment-alt fa-2x mb-2"></i></span>
                            <h6>Pengaduan</h6>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-success px-4 py-2">Apply</button>
                        </div>
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

        .checkbox {
            position: absolute;
            left: 15px;
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
            $('#order-table').DataTable();
        });
    </script>
@endpush