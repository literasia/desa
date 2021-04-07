@extends('layouts.desa')

{{-- config 1 --}}
@section('title', 'Data Penduduk | Penduduk')
@section('title-2', 'Penduduk')
@section('title-3', 'Penduduk')

@section('describ')
	Ini adalah halaman Penduduk untuk admin
@endsection

@section('icon-l', 'fa fa-users')
@section('icon-r', 'icon-home')

@section('link')
	{{ route('admin.data-penduduk.penduduk') }}
@endsection

{{-- main content --}}
@section('content')
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow-sm">
				<div class="card-body">
					<div class="card-block pt-0">
						<div class="dt-responsive table-responsive">
							<table id="order-table" class="table table-striped nowrap shadow-sm">
								<thead class="text-left">
									<tr>
										<th>No</th>
                                        <th>Nama Lengkap</th>
										<th>No. KK</th>
										<th>NIK</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Agama</th>
                                        <th>Pendidikan</th>
                                        <th>Pekerjaan</th>
										<th>Status</th>
                                        <th>Status Dalam Keluarga</th>
                                        <th>Kewarganegaraan</th>
                                        <th>Alamat</th>
                                        <th>RT/RW</th>
                                        <th>Desa/Kelurahan</th>
                                        <th>Kode Pos</th>
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
        });
    </script>
@endpush