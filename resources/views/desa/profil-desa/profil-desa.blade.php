@extends('layouts.desa')

{{-- config 1 --}}
@section('title', 'Profil Desa | Profil Desa')
@section('title-2', 'Profil Desa')
@section('title-3', 'Profil Desa')

@section('describ')
    Ini adalah halaman Profil Desa untuk admin
@endsection

@section('icon-l', 'fa fa-id-badge')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('desa.profil-desa.profil-desa') }}
@endsection

{{-- main content --}}
@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                        <div class="col-12 text-center">
                            <img id="img-profile" src="#"/>
                            <input type="file" onchange="displayImg(this);" />
                            <button class="btn btn-primary rounded mt-3">Pilih Gambar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                        <h4>Profil Desa</h4>
                        <form class="mt-4">
                            <div class="form-group row">
                                <label for="nama_desa" class="col-sm-4 col-form-label">Nama Desa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_desa" id="nama_desa" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_kepala_desa" class="col-sm-4 col-form-label">Kepala Desa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_kepala_desa" name="nama_kepala_desa" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat_desa" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat_desa" name="alamat_desa" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="notelp_desa" class="col-sm-4 col-form-label">No. Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="notelp_desa" name="notelp_desa" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Keterangan" class="col-sm-4 col-form-label ">Keterangan</label>
                                    <div class="col-sm-8">
                                    <textarea type="text" class="form-control" id="Keterangan" name="Keterangan" placeholder="Alamat" cols="10" rows="3"></textarea> 
                                </div>
                            </div>                                       
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="" class="btn btn-success">Simpan</a>  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                    <h4>Peta</h4>
                        <div class="col-12 text-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106412.05412244878!2d110.911941207651!3d-7.622584068974703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a18aeeb6a8c19%3A0x4027a76e35302c0!2sKaranganyar%2C%20Kec.%20Karanganyar%2C%20Kabupaten%20Karanganyar%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1617097890130!5m2!1sid!2sid" width="800" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                            </div>
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

        input[type='file'] {
            display: none;
        }

        #img-profile {
            display: none;
        }
    </style>
@endpush

{{-- addons js --}}
@push('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $('button').on('click', function(){
           $('input').trigger('click'); 
        });
    </script>
    <script type="text/javascript">
        function displayImg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-profile')
                        .attr('src', e.target.result)
                        .width(200)
                };

                reader.readAsDataURL(input.files[0]);

                document.getElementById("img-profile").style.display = "inline-block";
                document.getElementById("img-profile").style.backgroundPosition = "center";
            }
        }
    </script>
@endpush