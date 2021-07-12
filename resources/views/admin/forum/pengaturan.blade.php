@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Forum | Pengaturan')
@section('title-2', 'Pengaturan')
@section('title-3', 'Pengaturan')

@section('describ')
    Ini adalah halaman Pengaturan untuk admin
@endsection

@section('icon-l', 'icon-list')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.forum.pengaturan') }}
@endsection

{{-- main content --}}
@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card glass-card d-flex justify-content-center align-items-center p-2">
                <div class=" col-xl-12 card shadow mb-0 p-0">
                    <div class="card-body">
						<div class="mt-3 mb-5 forum-modal-wrapper">
								<h5 class="d-inline-block forum-modal-caption mt-4 px-2 text-info">Pengaturan Pengguna Forum</h5>
									<div class="border rounded p-3">
										<small class="d-block mb-2">Menetapkan batas waktu dan kemampuan posting pengguna lainnya</small>
										<div class="row mt-4 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Peran Forum</h6>
											<div class="form-group form-check mb-2" action="/action_page.php">
												<div class="form-row">
													<div class="col-auto mt-2">
														<input class="form-check-input" type="checkbox" name="reply" id="">
														<label class="form-check-label"> Secara otomatis memberikan pengunjung terdaftar sebagai peran forum</label>
													</div>
													<div class="col-auto">
														<select name="type" id="type" class="form-control-sm">
															<option value="">--Pilih Peserta--</option>
															<option value="keymaster">Keymaster</option>
															<option value="moderator">Moderator</option>
															<option value="peserta">Peserta</option>
															<option value="blokir_pengguna">Blokir Pengguna</option>
														</select>
													</div>
												</div>
											</div>														
										</div>
									</div>
									<div class="row mt-4 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Flooding</h6>
											<input type="checkbox" class="peran_forum" small class="d-block mt-2"> Izinkan perlindungan flooding dengan membatasi pengguna selama <input type="text" name="time" id="detik" class="col-md-1" type="number"/> detik setelah memposting </input>			
											<small class="d-block mt-2">Gunakan ini untuk mencegah pengguna mengirim spam ke forum Anda</small>
										</div>
									</div>
									<div class="row mt-4 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Editing</h6>
											<input type="checkbox" class="peran_forum" small class="d-block mt-2"> Izinkan pengguna untuk mengedit konten mereka selama <input type="text" name="time" id="menit" class="col-1" type="number"/> menit setelah memposting</input>			
											<small class="d-block mt-2">Jika dicentang, pengaturan ke "0 menit" memungkinkan pengeditan selamanya</small>
										</div>
									</div>
									<div class="row mt-4 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Anonymous</h6>
											<input type="checkbox" class="peran_forum" small class="d-block mt-2"> Izinkan pengguna tamu tanpa akun untuk membuat topik dan balasan</input>			
											<small class="d-block mt-2">Bekerja paling baik di intranet atau dipasangkan dengan tindakan antispam</small>
										</div>
									</div>									
								</div>
							</div>
							<div class="mt-3 mb-5 forum-modal-wrapper">
								<h5 class="d-inline-block forum-modal-caption mt-4 px-2 text-info">Fitur Forum</h5>
								<div class="border rounded p-3">
									<small class="d-block mb-2">Fitur forum yang dapat diaktifkan dan dinonaktifkan</small>
									<div class="row mt-4 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Auto-embed links</h6>
											<input type="checkbox" class="fitur_forum" small class="d-block mt-2"> Sematkan media (YouTube, Twitter, Flickr, dll...) langsung ke topik dan balasan</input>																					
										</div>
									</div>
									<div class="row mt-4 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Reply Threading</h6>
											<div class="form-group form-check mb-2" action="/action_page.php">
												<div class="form-row">
													<div class="col-auto mt-1">
														<input class="form-check-input" type="checkbox" name="reply" id="">
														<label class="form-check-label"> Aktifkan balasan berulir (bersarang) sedalam</label>
													</div>
													<div class="col-auto">
														<select name="type" id="type" class="form-control-sm">
															<option value="">--Pilih Level--</option>
															<option value="2">2 Level</option>
															<option value="3">3 Level</option>
															<option value="4">4 Level</option>
															<option value="5">5 Level</option>
														</select>
													</div>
												</div>
											</div>														
										</div>
									</div>
									<div class="row mt-3 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Revisions</h6>
											<input type="checkbox" class="fitur_forum" small class="d-block mt-2"> Izinkan revisi pada topik dan balas pesan</input>			
										</div>
									</div>
									<div class="row mt-3 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Favorites</h6>
											<input type="checkbox" class="fitur_forum" small class="d-block mt-2"> Izinkan pengguna untuk menandai topik sebagai favorit</input>			
										</div>
									</div>
									<div class="row mt-3 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Subscriptions</h6>
											<input type="checkbox" class="fitur_forum" small class="d-block mt-2"> Izinkan pengguna untuk berlangganan forum dan topik</input>			
										</div>
									</div>
									<div class="row mt-3 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Engagements</h6>
											<input type="checkbox" class="fitur_forum" small class="d-block mt-2"> Izinkan pelacakan topik yang melibatkan setiap pengguna</input>			
										</div>
									</div>
									<div class="row mt-3 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Topic tags</h6>
											<input type="checkbox" class="fitur_forum" small class="d-block mt-2"> Izinkan topik memiliki tautan</input>			
										</div>
									</div>
									<div class="row mt-3 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Search</h6>
											<input type="checkbox" class="fitur_forum" small class="d-block mt-2"> Izinkan pencarian di seluruh forum</input>			
										</div>
									</div>
									<div class="row mt-3 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Post Formatting</h6>
											<input type="checkbox" class="fitur_forum" small class="d-block mt-2"> Tambahkan bilah alat dan tombol ke area teks untuk membantu pemformatan HTML</input>			
										</div>
									</div>
									<div class="row mt-3 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Forum Moderators</h6>
											<input type="checkbox" class="fitur_forum" small class="d-block mt-2"> Izinkan forum memiliki moderator khusus</input>
											<small class="d-block mt-2">Ini tidak termasuk kemampuan untuk mengedit pengguna</small>			
										</div>
									</div>
									<div class="row mt-3 mb-2">
										<div class="col-md-12">
											<h6 class="font-weight-bold">Super Moderators</h6>
											<input type="checkbox" class="fitur_forum" small class="d-block mt-2"> Izinkan Moderator dan Keymaster untuk mengedit pengguna</input>
											<small class="d-block mt-2">Ini termasuk peran, kata sandi, dan alamat email</small>			
										</div>
									</div>
								</div>
							</div>
							<div class="mt-3 mb-5 forum-modal-wrapper">
								<h5 class="d-inline-block forum-modal-caption mt-4 px-2 text-info">Fitur Topik dan Balasan per Halaman</h5>
									<div class="border rounded p-3">
										<small class="d-block mb-2">Berapa banyak topik dan balasan yang ditampilkan per halaman</small>
										<div class="form-group">									
											<div class="row mt-4 mb-2">
													<div class="col-md-12">
														<h6 class="font-weight-bold" label for="topics">Topics</h6>
														<input type="text" name="balasan" id="balasan" class="col-1" type="number"/> per halaman</input>
													</div>
											</div>
										</div>
										<div class="form-group">												
											<div class="row mt-4 mb-2">
												<div class="col-md-12">
													<h6 class="font-weight-bold" label for="balasan">Balasan</h6>
													<input type="text" name="balasan" id="balasan" class="col-1" type="number"/> per halaman</input>
												</div>
											</div>								
										</div>
									</div>
								</div>
									<div class="md-3" style="margin-left: 85%">                        
										<input type="save" class="btn btn-sm btn-success" value="Simpan" id="btn">
									</div>
							</div>														
						</div>															
					</div>				
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection   

{{-- addons js --}}
@push('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datedropper/js/datedropper.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script> 

	<style>
	.forum-modal-wrapper {
        position: relative;
    }

    .forum-modal-caption {
        position: absolute;
        top: -35px;
        left: 20px;
        background: #fff;
    }
	
	.glass-card {
        background: rgba( 255, 255, 255, 0.40 );
        box-shadow: 0 8px 32px 0 rgb(31 38 135 / 22%);
        backdrop-filter: blur( 17.5px );
        -webkit-backdrop-filter: blur( 17.5px );
        border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 );
    }
</style>
@endpush