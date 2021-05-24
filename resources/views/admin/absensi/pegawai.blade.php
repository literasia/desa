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
                        <form id="form-absensi" action="{{route("admin.absensi.pegawai")}}" method="get">
                            <input type="hidden" name="req" value="table">
                            <input type="hidden" name="village_id" value="{{ $admin->village_id }}">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                                    <input type="text" name="tanggal" id="tanggal" class="form-control form-control-sm" placeholder="Tanggal" readonly required value="{{request()->tanggal ?? ''}}">
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6">
                                    <input type="submit" value="Pilih" class="btn btn-block btn-sm btn-primary shadow-sm">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card glass-card d-flex justify-content-center align-items-center p-2">
                <div class=" col-xl-12 card shadow mb-0 p-0">
                    <div class="card-body">
                        <div class="card-block p-2">
                            <div class="dt-responsive table-responsive">
                                <table id="order-table" class="table table-striped nowrap shadow-sm">
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
                                        @foreach ($data as $d)
                                        <form class="form-absensi">
                                            <input type="hidden" name="employee_id" value="{{$d->id}}">
                                            <input type="hidden" name="village_id" value="{{request()->village_id}}">
                                            <input type="hidden" name="tanggal" value="{{request()->tanggal}}">
                                            <tr>
                                                <td>{{$d->name}}</td>
                                                <td class="text-center">{{$admin->village->name}}</td>
                                                <td class="text-center"><input type="radio" name="status" value="H" {{$d->attendance && $d->attendance->status == "H" ? "checked" : ""}} required ></td>
                                                <td class="text-center"><input type="radio" name="status" value="A" {{$d->attendance && $d->attendance->status == "A" ? "checked" : ""}} required ></td>
                                                <td class="text-center"><input type="radio" name="status" value="S" {{$d->attendance && $d->attendance->status == "S" ? "checked" : ""}} required ></td>
                                                <td class="text-center"><input type="radio" name="status" value="I" {{$d->attendance && $d->attendance->status == "I" ? "checked" : ""}} required ></td>
                                                <td class="text-center"><input type="radio" name="status" value="L" {{$d->attendance && $d->attendance->status == "L" ? "checked" : ""}} required ></td>
                                                <td id="submit_{{$d->id}}" class="text-center">
                                                    @if ($d->attendance)
                                                        APPROVE
                                                    @else
                                                        <input type="submit" class="btn btn-success" value="approve">
                                                    @endif
                                                </td>
                                            </tr>
                                        </form>
                                        @endforeach
                                    </tbody>
                                </table>
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

            $(".form-absensi").on('submit', function(ev){
                ev.preventDefault();
                var params = {};
                $.each($(this).serializeArray(), function() {
                    params[this.name] = this.value;
                });
                params = {
                    ...params,
                    req: 'write'
                };
                $.post("{{route('admin.absensi.pegawai.write')}}", params).done(data => {
                    toastr.success('Data berhasil disimpan');
                    $(`#submit_${params.employee_id}`).html("APPROVE");
                }).fail((data) => {
                    if(typeof data.responseJSON.message == 'string')
                        return Swal.fire('Error', data.responseJSON.message, 'error');
                    else if(typeof data.responseText == 'string')
                        return Swal.fire('Error', data.responseText, 'error');
                })
            })
        });
    </script>
@endpush
