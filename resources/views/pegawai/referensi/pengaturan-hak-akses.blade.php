@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Referensi | Pengaturan Hak Akses')
@section('title-2', 'Pengaturan Hak Akses')
@section('title-3', 'Pengaturan Hak Akses')

@section('describ')
    Ini adalah halaman Pengaturan Hak Akses untuk admin
@endsection

@section('icon-l', 'fa fa-list-alt')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.referensi.pengaturan-hak-akses') }}
@endsection

{{-- main content --}}
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                        <div class="toolbar">
                            <h5 class="mb-3">Keterangan</h5>
                            <ol class="pl-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <li>
                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">KA</label></span>
                                            <span> : Kalender</span>
                                        </li>
                                        <li>
                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">DP</label></span>
                                            <span> : Data Penduduk</span>
                                        </li>
                                        <li>
                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">SD</label></span>
                                            <span> : Struktur Desa</span>
                                        </li>
                                        <li>
                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">PD</label></span>
                                            <span> : Profil Desa</span>
                                        </li>
                                        <li>
                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">Bd</label></span>
                                            <span> : Berita</span>
                                        </li>
                                        <li>
                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">AD</label></span>
                                            <span> : Administrasi Desa</span>
                                        </li>
                                        <li>
                                        <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">R</label></span>
                                            <span> : Referensi</span>
                                        </li>
                                    </div>
                                    <div class="col-md-4">
                                        <li>
                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">PD</label></span>
                                            <span> : Potensi Desa</span>
                                        </li>
                                        <li>

                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">TE</label></span>
                                            <span> : Template</span>
                                        </li>
                                        <li>

                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">LU</label></span>
                                            <span> : Log User</span>
                                        </li>
                                        <li>

                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">R</label></span>
                                            <span> : Referensi</span>
                                        </li>
                                        <li>

                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">BT</label></span>
                                            <span> : Buku Tamu</span>
                                        </li>
                                        <li>
                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">SD</label></span>
                                            <span> : Slider</span>
                                        </li>
                                        <li>
                                        <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">P</label></span>
                                            <span> : Pengaduan</span>
                                        </li>
                                    </div>
                                    <div class="col-md-4">
                                        <li>

                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">PER</label></span>
                                            <span> : Perpustakaan</span>
                                        </li>
                                        <li>

                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">KE</label></span>
                                            <span> : Keuangan</span>
                                        </li>
                                        <li>

                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">S&P</label></span>
                                            <span> : Sarana & Prasarana</span>
                                        </li>
                                        <li>

                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">PT</label></span>
                                            <span> : Peristiwa</span>
                                        </li>
                                        <li>

                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">WD</label></span>
                                            <span> : Wisata Desa</span>
                                        </li>
                                        <li>

                                            <span class="d-inline-block ml-2 access-label"><label class="badge badge-primary badge-lg">K</label></span>
                                            <span> : Kampanye</span>
                                        </li>


                                    </div>
                                </div>
                            </ol>
                        </div>
                        <div class="dt-responsive table-responsive">
                            <table id="order-table" class="table table-striped nowrap shadow-sm">
                                <thead>
                                    <tr class="text-left">
                                    <th>Nama</th>
                                    <th title="Kalender" >KA</th>
                                    <th title="Template">TE</th>
                                    <th title="Log User">LU</th>
                                    <th title="Perpustakaan">PER</th>
                                    <th title="Buku Tamu">BT</th>
                                    <th title="Keuangan">KE</th>
                                    <th title="Data Penduduk">DP</th>
                                    <th title="Struktur Desa">SD</th>
                                    <th title="Profil Desa">PD</th>
                                    <th title="Berita">BD</th>
                                    <th title="Administrasi">AD</th>
                                    <th title="Potensi Desa">PD</th>
                                    <th title="Slider">SD</th>
                                    <th title="Peristiwa">PT</th>
                                    <th title="Wisata Desa">WD</th>
                                    <th title="Pengumuman">PM</th>
                                    <th title="Kampanye">K</th>
                                    <th title="Referensi">R</th>
                                    <th title="Pengaduan">P</th>
                                </tr>
                                </thead>
                                <tbody  class="text-left">
                                    @foreach ($employees as $emp)
                                        <tr>
                                            <td>{{$emp->name}}</br> (Aparat Desa / Pegawai)</td>
                                            @foreach ($accessFields as $f)
                                            @if (strpos($f,"_at")|| strpos($f,"_id") || $f === "id" )
                                            @else
                                                <td>
                                                    <div class="checkbox-radios">
                                                        <div class="form-check">
                                                            <label class="form-check-label">

                                                            <input class="form-check-input" type="checkbox" {{$emp->access[$f]?"checked":""}} id="{{$f.$emp->id}}" onclick="check('{{ $emp->id }}', '{{$f.$emp->id}}', '{{ $f }}');">
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        @endforeach
                                        </tr>
                                    @endforeach
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
    <style>
        .btn i {
            margin-right: 0px;
        }
        .access-label {
            width: 3.6rem;
        }
        .badge {
            border-radius: 5px!important;
            display: inline-block;
            width: 3.5rem;
        }
    </style>
@endpush

{{-- addons js --}}
@push('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#order-table').DataTable();
        });

        function check(pegawai_id, id_check_form, structure){
            console.log(pegawai_id, id_check_form, structure)
            $.ajax({
                url : "{{ route('admin.referensi.pengaturan-hak-akses-update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    pegawai_id,
                    structure
                }
        });
    }
    </script>
@endpush
