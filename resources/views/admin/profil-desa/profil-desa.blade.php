@extends('layouts.admin')

{{-- config 1 --}}
@section('title', 'Profil Desa | Profil Desa')
@section('title-2', 'Profil Desa')
@section('title-3', 'Profil Desa')

@section('describ')
    Ini adalah halaman Profil Desa untuk Admin
@endsection

@section('icon-l', 'fa fa-id-badge')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('admin.profil-desa.profil-desa') }}
@endsection

{{-- main content --}}
@section('content')
    <form id="profile-form" method="POST">
        @csrf
        <div class="row"> 
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="col-12 text-center">
                                <div class="form-group">
                                    <h4 class="mb-4">Foto Profil Desa</h4>
                                    <img id="thumb_gallery" class="{{ empty($profile->photo)?"":"not_empty" }}" src="{{ asset('storage/'.$profile->photo) }}" />
                                    {{-- <label for="gallery1" class="sr-only">Pilih Gambar</label> --}}
                                    {{-- <input type="file" id="gallery1" class="gallery" name="photo"> --}}
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
                            <h4>Profil Desa</h4>
                            <div class="form-group row">
                                <label for="nama_desa" class="col-sm-4 col-form-label">Nama Desa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_name" value="{{ auth()->user()->village->name }}" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="village_chief" class="col-sm-4 col-form-label">Kepala Desa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="village_chief" name="village_chief" placeholder="Kepala Desa" value="{{ $profile->village_chief }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Alamat" value="{{ $profile->address }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-sm-4 col-form-label">No. Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="No. Telepon" value="{{ $profile->phone_number }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Keterangan">{{ $profile->description }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="phone_number" class="col-sm-4 col-form-label">Embed Maps</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="embed_maps" name="embed_maps" placeholder="Masukkan Embed Maps Desa disini" value="{{ $profile->embed_maps }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <p>Bagaimana cara mendapatkan Embed Maps desa? Klik link dibawah</p>
                                    <a href="https://www.ramadhanwaliqram.my.id/2021/06/cara-mendapatkan-kode-embed-google-maps.html" target="_blank" class="h6 btn-link">Cara mendapatkan Embed Maps dari Google Maps <i class="fa fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-right">
                                    <button type="submit" href="" id="btn-profil" class="btn btn-success">Simpan Profil</button>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12" id="gallery-container">
            @include('admin.profil-desa._profile-gallery', [$galleries])
        </div>
        {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                    <h4>Peta</h4>
                        <div class="col-md-12 text-center google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15927.860122700129!2d98.72589717678544!3d3.5954904581368505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30313139834532ad%3A0x3525a16ce231639b!2sTembung%2C%20Medan%20Tembung%2C%20Medan%20City%2C%20North%20Sumatra!5e0!3m2!1sen!2sid!4v1619078697909!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                       
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
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
        // $('.gallery').each(function() {
        //     var label = $(this).parents('.form-group').find('label').text();
        //     label = (label) ? label : 'Pilih Gambar';
        //     target = $(this).attr("id");
        //     $(this).wrap('<div class="inputfile"></div>');
        //     $(this).before('<span class="btn-upload" target="'+target+'">'+label+'</span>');
        //     $(this).before('<span class="file-selected"></span>');
        //     $(this).change(function(e){
        //         var val = $(this).val();
        //     });
        // });
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
                $('body').on("change", "#gallery2", function(e) {
                    // alert("kok ini?");
                    var formData = new FormData($('#gallery-form')[0]);

                    $.ajax({
                        url: "{{ route('admin.profil-desa.add-gallery') }}",
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('#btn-galeri').text('Mengunggah...');
                        }, 
                        success: function (data) {
                            if (data.error) {
                                html = data.error;
                                Swal.fire('Error!', html??"Gagal menyimpan gallery", 'danger');
                            }
                            Swal.fire('Sukses!', 'Berhasil menambah gallery', 'success');
                            refreshGallery();
                            $('#btn-galeri').text('Tambah Galeri');
                        },
                        error:function(err){
                            Swal.fire('Error!', 'Ukuran gambar tidak boleh lebih dari 3MB', 'error')
                        }
                    });

                    $('#gallery-form')[0].reset();
                    // var files = e.target.files,
                    // filesLength = files.length;
                    // console.log(filesLength);
                    // count++;
                    // for (var i = 0; i < filesLength; i++) {
                    //     var f = files[i]
                    //     var fileReader = new FileReader();
                    //     fileReader.onload = (function(e) {
                    //         var file = e.target;
                    //         var img = '<div class="thumb_pict d-inline-block">' +
                    //                     '<img class="d-block mb-3" src="'+e.target.result+'" />' + 
                    //                     '<div class="btn btn-outline-danger btn-sm remove d-block">Hapus</div>' +
                    //                 '</div>';
                    //         $('#thumb-output').append(img);
                    //         $(".remove").click(function(){
                    //             $(this).parent(".thumb_pict").remove();
                    //         });
                    //     });
                    //     fileReader.readAsDataURL(f);
                    //     $(".thumb_pict").addClass("not_empty");
                    // }
                });
            } else {
                alert("Your browser doesn't support to File API");
            }
            // $('#gallery2').on('change', function(){
            //     if (window.File && window.FileReader && window.FileList && window.Blob){
            //         var data = $(this)[0].files;
        
            //         $.each(data, function(index, file){
            //             if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
            //                 var fRead = new FileReader();
            //                 fRead.onload = (function(file){
            //                 return function(e) {
            //                    var img = '<div class="thumb_pict d-inline-block">' +
            //                                 '<img class="d-block mb-3" src="'+e.target.result+'" />' + 
            //                                 '<div class="btn btn-outline-danger btn-sm remove d-block">Hapus</div>' +
            //                             '</div>';
            //                     $('#thumb-output').append(img);
            //                     $(".remove").click(function(){
            //                         $(this).parent(".thumb_pict").remove();
            //                     });
            //                 };
            //             })(file);
            //             fRead.readAsDataURL(file);
            //             $(".thumb_pict").addClass("not_empty");
            //         }
            //     });
                    
            //     }else{
            //         alert("Your browser doesn't support File API!");
            //     }
            // });

            $('#profile-form').on('submit', function (event) {
                event.preventDefault();

                var formData = new FormData($('#profile-form')[0]);

                $.ajax({
                    url: "{{ route('admin.profil-desa.profile-update') }}",
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
                            Swal.fire('Error!', html??"Gagal menyimpan profil", 'danger');
                        }
                        if (data.success) {
                            Swal.fire('Sukses!', 'Berhasil update profil', 'success');
                            $('#btn-profil').text('Simpan Profil');
                        }
                    },
                    error:function(err){
                        Swal.fire('Error!', 'Error saat menyimpan profil desa. Coba beberapa saat lagi', 'error')
                    }
                });
            });

            function refreshGallery()
            {
                $.ajax({
                    url: "{{ route('admin.profil-desa.refresh-gallery') }}",
                    success: function (data) {
                        $("#gallery-container").html(data);
                    }
                });
            }

            $(document).on('click', '.remove-gallery', function(){
                var id = $(this).data("id");
                Swal.fire({
                    title: 'Hapus gambar ini?',
                    text: "Gambar tidak akan bisa dikembalikan setelah dihapus",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                    cancelButtonText:'Batal',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.profil-desa.delete-gallery') }}",
                            method: 'POST',
                            data: {
                                id, _token:"{{ csrf_token() }}"
                            },
                            success: function (data) {
                                if (data.error) {
                                    html = data.error;
                                    Swal.fire('Error!', html??"Gagal menghapus gallery", 'danger');
                                }
                                Swal.fire('Sukses!', 'Berhasil menghapus gallery', 'success');
                                refreshGallery();
                            },
                            error:function(err){
                                Swal.fire('Error!', 'Error saat menghapus gallery. Coba beberapa saat lagi', 'error')
                            }
                        });
                    }
                })
            })
        });
    </script>
@endpush