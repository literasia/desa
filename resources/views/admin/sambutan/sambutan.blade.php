@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Sambutan Kepala Desa | Sambutan')
@section('title-2', 'Sambutan Kepala Desa')
@section('title-3', 'Sambutan Kepala Desa')

@section('describ')
    Ini adalah halaman sambutan kepala desa untuk Admin
@endsection

@section('icon-l', 'fa fa-id-badge')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.profil-desa.profil-desa') }}
@endsection

{{-- main content --}}
@section('content')
    <form id="sambutan-form" method="POST">
        @csrf
        <div class="row"> 
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="col-12 text-center">
                                <div class="form-group">
                                    <h4 class="mb-4">Foto Kepala Desa</h4>
                                    <img id="thumb_gallery" class="{{ empty($sambutan_kepala_desa->photo)?"":"not_empty" }}" src="{{ asset('storage/'.$sambutan_kepala_desa->photo) }}" />
                                    <div class="input-file">
                                        <span class="btn-upload" target="#gallery1">Pilih Gambar</span>
                                        <span class="file-selected"></span>
                                        <input type="file" name="photo" id="gallery1" class="gallery"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-block">
                            <h4>Sambutan</h4>
                            <div class="form-group row">
                                <input type="hidden" name="id" value="{{ $sambutan_kepala_desa->id }}">
                                <label for="title" class="col-sm-4 col-form-label">Judul</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Judul" value="{{ $sambutan_kepala_desa->title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-sm-4 col-form-label">Isi</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" rows="10" id="content" name="content" placeholder="Isi">{{ $sambutan_kepala_desa->content }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-right">
                                    <button type="submit" href="" id="btn-profil" class="btn btn-success">Simpan</button>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

{{-- addons css --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <style>
        img {
            width: 150px;
        }

        .btn i {
            margin-right: 0px;
        }

        #gallery1, #gallery2 {
            visibility: hidden;
            width: 1px;
            height: 1px;
        }
        .btn-upload {
            background: #00bcbe;
            -webkit-border-radius: .25rem;
            -moz-border-radius: .25rem;
            border-radius: .25rem;
            color: #fff;
            padding: .375rem .75rem;
        }

        .btn-upload:hover, .btn-upload:active, .btn-upload:focus {
            background: #00a2a4;
            cursor: pointer;
        }
            
        .file-selected {
            font-size: 10px;
            text-align: center;
            width: 100%;
            display: block;
            margin-top: 5px;
        }

        #thumb_gallery {
            display: none;
        }

        #thumb_gallery.not_empty {
            width: 200px;
            object-fit: cover;
        }

        #thumb_gallery.not_empty, .thumb_pict.not_empty {
            display: inline-block;
            margin-bottom: 30px;
        }
        .thumb-img-container {
            position: relative;
            margin-bottom:5px;
        }

        .thumb-img-container::after {
            content: "";
            display: block;
            padding-bottom: 100%;
        }

        .thumb-img-container img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumb_pict {
            margin-bottom:30px;
            padding: 20px;
            -webkit-box-shadow: 0 0 5px 0 rgb(43 43 43 / 10%), 0 11px 6px -7px rgb(43 43 43 / 10%);
            box-shadow: 0 0 5px 0 rgb(43 43 43 / 10%), 0 11px 6px -7px rgb(43 43 43 / 10%);
            border-radius: .25rem;
        }

        .thumb_pict img{
            width:100%;
            max-height:500px
        }

        .google-maps {
            position: relative;
            padding-bottom: 75%; 
            height: 0;
            overflow: hidden;
        }

        .google-maps iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100% !important;
            height: 100% !important;
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
    <script type="text/javascript">
        function thumb_gallery(inputFile){
            var file = inputFile[0].files[0];
            if(file){
                var reader = new FileReader();
     
                reader.onload = function(){
                    $("#thumb_gallery").attr("src", reader.result);
                }
     
                reader.readAsDataURL(file);
                $("#thumb_gallery").addClass("not_empty");
            }
        }

        var count = 0;
        $(document).ready(function(){
            if (window.File && window.FileList && window.FileReader && window.Blob) {
                $('body').on('click', '.btn-upload', function(){
                    $($(this).attr("target")).trigger('click');
                });

                $('body').on("change","#gallery1",function(){
                    thumb_gallery($(this))
                });
            } else {
                alert("Your browser doesn't support to File API");
            }

            $('#sambutan-form').on('submit', function (event) {
                event.preventDefault();

                var formData = new FormData($('#sambutan-form')[0]);

                $.ajax({
                    url: "{{ route('admin.sambutan-kepala-desa.update') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('#btn-profil').text('Menyimpan...');
                    },
                    success: function (data) {
                        var html = ''
                        if (data.errors) {
                            html = data.errors[0];
                            Swal.fire('Error!', html??"Gagal menyimpan sambutan kepala desa", 'danger');
                        }
                        if (data.success) {
                            Swal.fire('Sukses!', 'Berhasil update sambutan kepala desa', 'success');
                            $('#btn-profil').text('Simpan Profil');
                        }
                    },
                    error:function(err){
                        Swal.fire('Error!', 'Error saat menyimpan sambutan kepala desa. Coba beberapa saat lagi', 'error')
                    }
                });
            });
        });
    </script>
@endpush