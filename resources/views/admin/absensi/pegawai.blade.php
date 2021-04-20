@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Absensi | Absesnsi Pegawai')
@section('title-2', 'Absesnsi Pegawai')
@section('title-3', 'Absesnsi Pegawai')

@section('describ')
    Ini adalah halaman Absensi Pegawai per Desa untuk admin
@endsection

@section('icon-l', 'fa fa-clipboard-list')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.absensi.pegawai') }}
@endsection

{{-- main content --}}
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="card-block">
                        <h6>Pilih Desa</h6>
                        <form id="form-absensi" action="" method="get">
                            <input type="hidden" name="req" value="table">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                                    <select name="" id="pilih" class="form-control form-control-sm" required>
                                        <option value="">-- Desa --</option>
                                            <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                                    <input type="text" name="tanggal" id="tanggal" class="form-control form-control-sm" placeholder="Tanggal" readonly required value="">
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6">
                                    <input type="submit" value="Pilih" class="btn btn-block btn-sm btn-primary shadow-sm">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="order-table" class="table table-striped table-bordered nowrap shadow-sm">
                                <thead class="text-left">
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th class="text-center">Desa</th>
                                        <th class="text-center">H</th>
                                        <th class="text-center">A</th>
                                        <th class="text-center">S</th>
                                        <th class="text-center">I</th>
                                        <th class="text-center">Lainnya</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-left">
                                    <form class="form-absensi">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="" value="">
                                        <tr>
                                            <td></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><input type="radio" name="status" value="H" required></td>
                                            <td class="text-center"><input type="radio" name="status" value="A" required></td>
                                            <td class="text-center"><input type="radio" name="status" value="S" required></td>
                                            <td class="text-center"><input type="radio" name="status" value="I" required></td>
                                            <td class="text-center"><input type="radio" name="status" value="L" required></td>
                                            <td id="" class="text-center">
                                                <input type="submit" class="btn btn-success" value="approve">
                                            </td>
                                        </tr>
                                    </form>
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#tanggal').dateDropper({
                theme: 'leaf',
                format: 'Y-m-d'
            });
        });
    </script>
@endpush