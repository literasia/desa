@extends('layouts.admin')

@section('title', 'Dashboard')
@section('title-2', 'Dashboard')
@section('title-3', 'Dashboard')
@section('describ')
    Ini adalah halaman dashboard awal untuk Superadmin
@endsection
@section('icon-l', 'icon-home')
@section('icon-r', 'icon-home')
@section('link')
    {{ route('admin.index') }}
@endsection

@section('content')
<div class="row">
    {{-- sale revenue card start --}}
    <div class="col-md-12 col-xl-8">
        <div class="card sale-card">
            <div class="card-header">
                <h5>Peta</h5>
            </div>
            {{-- <div class="card-block">
                <div id="sales-analytics" class="chart-shadow" style="height:320px"></div>
            </div> --}}
            <div class="col-md-12 text-center google-maps mt-2 mb-2">
                {!! $maps['embed_maps'] ?? "-" !!}                     
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-4">
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-b-25">E-Book</h6>
                        <h3 class="f-w-700 text-c-blue">{{ 100 }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-open bg-c-blue"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-b-25">Audio Book</h6>
                        <h3 class="f-w-700 text-c-green">{{ 100 }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-audio bg-c-green"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-b-25">Video Book</h6>
                        <h3 class="f-w-700 text-c-yellow">{{ 100 }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-video bg-c-yellow"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6>Pegawai</h6>
                        <h5 class="m-b-30 f-w-700">{{ $employee }}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-c-yellow" style="width:{{100}}%"></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user bg-c-green"></i>
                    </div>                        
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6>Penduduk</h6>
                        <h5 class="m-b-30 f-w-700">{{ $citizen }}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-c-red" style="width:{{100}}%"></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users bg-c-blue"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6>Kep. Keluarga</h6>
                        <h5 class="m-b-30 f-w-700">{{ $family }}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-c-yellow" style="width:{{100}}%"></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user bg-c-green"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6>Usaha</h6>
                        <h5 class="m-b-30 f-w-700">{{ $potency }}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-c-blue" style="width:{{100}}%"></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-home bg-c-red"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- Sekolah SD SMP SMA SMK --}}
    {{-- <div class="col-md-3">
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6>SD</h6>
                        <h5 class="m-b-30 f-w-700">{{ $sd }}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-c-red" style="width:{{$persentase_sd}}%"></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-school bg-c-red"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6>SMP</h6>
                        <h5 class="m-b-30 f-w-700">{{ $smp }}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-c-blue" style="width:{{$persentase_smp}}%"></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-school bg-c-blue"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6>SMA</h6>
                        <h5 class="m-b-30 f-w-700">{{ $sma }}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-c-yellow" style="width:{{$persentase_sma}}%"></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-school bg-c-yellow"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card comp-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6>SMK</h6>
                        <h5 class="m-b-30 f-w-700">{{ $smk }}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-c-green" style="width:{{$persentase_smk}}%"></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-school bg-c-green"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


</div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('assets/pages/dashboard/custom-dashboard.min.js') }}"></script>
@endpush