@extends('layouts.admin')

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
    {{ route('admin.profil-desa.profil-desa') }}
@endsection

{{-- main content --}}
@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                        <div class="col-12 text-center">
                            <div class="form-group">
                                <h4 class="mb-4">Foto Profil Desa</h4>
                                <img id="previewImg" />
                                <label for="file" class="sr-only"></i>Pilih Gambar</label>
                                <input type="file" name="photo" id="file" class="upload">
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
                        <form class="mt-4">
                            <div class="form-group row">
                                <label for="nama_desa" class="col-sm-4 col-form-label">Nama Desa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_desa" value="{{ auth()->user()->village->name }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_kepala_desa" class="col-sm-4 col-form-label">Kepala Desa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_kepala_desa" name="nama_kepala_desa" placeholder="Kepala Desa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat_desa" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat_desa" name="alamat_desa" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="notelp_desa" class="col-sm-4 col-form-label">No. Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="notelp_desa" name="notelp_desa" placeholder="No. Telepon">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"></textarea>
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
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-block">
                        <h4 class="mb-3">Upload Galeri <h5 style="color:#999;margin-bottom:30px;">(maks 6)</h5></h4>
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="badge badge-warning mb-4">1</span>
                                    <div class="card">
                                        <img id="thumb-gallery1" style="max-height:300px;max-width:100%;border:#eee solid 1px;" class="thumb_gallery">
                                    </div>
                                    <input type="file" name="gallery[]" id="gallery1" class="gallery">
                                </div>
                                <div class="col-md-4">
                                    <span class="badge badge-warning mb-4">2</span>
                                    <div class="card">
                                        <img id="thumb-gallery2" style="max-height:300px;max-width:100%;border:#eee solid 1px;" class="thumb_gallery">
                                    </div>
                                    <label for="gallery2" class="sr-only">Pilih Gambar</label>
                                    <input type="file" name="gallery[]" id="gallery2" class="gallery">
                                </div>
                                <div class="col-md-4">
                                    <span class="badge badge-warning mb-4">3</span>
                                    <div class="card">
                                        <img id="thumb-gallery3" style="max-height:300px;max-width:100%;border:#eee solid 1px;" class="thumb_gallery">
                                    </div>
                                    <label for="gallery3" class="sr-only">Pilih Gambar</label>
                                    <input type="file" name="gallery[]" id="gallery3" class="gallery">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="badge badge-warning mb-4">4</span>
                                    <div class="card">
                                        <img id="thumb-gallery4" style="max-height:300px;max-width:100%;border:#eee solid 1px;" class="thumb_gallery">
                                    </div>
                                    <label for="gallery4" class="sr-only">Pilih Gambar</label>
                                    <input type="file" name="gallery[]" id="gallery4" class="gallery">
                                </div>
                                <div class="col-md-4">
                                    <span class="badge badge-warning mb-4">5</span>
                                    <div class="card">
                                        <img id="thumb-gallery5" style="max-height:300px;max-width:100%;border:#eee solid 1px;" class="thumb_gallery">
                                    </div>
                                    <label for="gallery5" class="sr-only">Pilih Gambar</label>
                                    <input type="file" name="gallery[]" id="gallery5" class="gallery">
                                </div>
                                <div class="col-md-4">
                                    <span class="badge badge-warning mb-4">6</span>
                                    <div class="card">
                                        <img id="thumb-gallery6" style="max-height:300px;max-width:100%;border:#eee solid 1px;" class="thumb_gallery">
                                    </div>
                                    <label for="gallery6" class="sr-only">Pilih Gambar</label>
                                    <input type="file" name="gallery[]" id="gallery6" class="gallery">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-right mt-4">
                                    <input type="submit" name="" class="btn btn-success" value="Simpan">
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
                        <div class="col-md-12 text-center google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106412.05412244878!2d110.911941207651!3d-7.622584068974703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a18aeeb6a8c19%3A0x4027a76e35302c0!2sKaranganyar%2C%20Kec.%20Karanganyar%2C%20Kabupaten%20Karanganyar%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1617097890130!5m2!1sid!2sid" width="800" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                            
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

        .previewImg {
            display: none;
        }

        #file, #gallery1, #gallery2, #gallery3, #gallery4, #gallery5, #gallery6 {
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

        .thumb{
            margin: 10px 20px 0 0;
            width: 200px;
            padding: 20px;
            -webkit-box-shadow: 0 0 5px 0 rgb(43 43 43 / 10%), 0 11px 6px -7px rgb(43 43 43 / 10%);
            box-shadow: 0 0 5px 0 rgb(43 43 43 / 10%), 0 11px 6px -7px rgb(43 43 43 / 10%);
            border-radius: .25rem;
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
    <script type="text/javascript">
        $('#file').each(function() {
            // get label text
            var label = $(this).parents('.form-group').find('label').text();
            label = (label) ? label : 'Pilih Gambar';

            // wrap the file input
            $(this).wrap('<div class="input-file"></div>');
            // display label
            $(this).before('<span class="btn-upload">'+label+'</span>');
            // we will display selected file here
            $(this).before('<span class="file-selected"></span>');

            // file input change listener 
            $(this).change(function(e){
                // Get this file input value
                var val = $(this).val();
                
                // Let's only show filename.
                // By default file input value is a fullpath, something like 
                // C:\fakepath\Nuriootpa1.jpg depending on your browser.
                var filename = val.replace(/^.*[\\\/]/, '');

                // Display the filename
                $(this).siblings('.file-selected').text(filename);
            });
        });

        // Open the file browser when our custom button is clicked.
        $('.input-file .btn-upload').click(function() {
            $(this).siblings('#file').trigger('click');
        });

        $('.gallery').change(function(){
            _this = $(this);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $('#thumb-'+_this.attr("id")).attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        });

        $('.gallery').each(function() {
            var label = $(this).parents('.form-group').find('label').text();
            label = (label) ? label : 'Pilih Gambar';
            target = $(this).attr("id");
            $(this).wrap('<div class="inputfile"></div>');
            $(this).before('<span class="btn-upload" target="'+target+'">'+label+'</span>');
            $(this).before('<span class="file-selected"></span>');

            $(this).change(function(e){
                var val = $(this).val();
               
                var filename = val.replace(/^.*[\\\/]/, '');

                $(this).siblings('.file-selected').text(filename);
            });
        });


        $('.btn-upload').click(function() {
            target = $(this).attr("target");
            $("#"+target).trigger('click');
        });
    </script>
    <script type="text/javascript">
        $(document).on("change",".upload",function(){
            previewFile($(this))
        })

        function previewFile(inputFile){
            var file = inputFile[0].files[0];
            if(file){
                var reader = new FileReader();
     
                reader.onload = function(){
                    $("#previewImg").attr("src", reader.result);
                }
     
                reader.readAsDataURL(file);

                document.getElementById("previewImg").style.display = "inline-block";
                document.getElementById("previewImg").style.width = "200px";
                document.getElementById("previewImg").style.marginBottom = "30px";
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#file-input').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                                $('#thumb-output').append(img); //append image to output element
                            };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                    
                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endpush
