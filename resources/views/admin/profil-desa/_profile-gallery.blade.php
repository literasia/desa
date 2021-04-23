<div class="card shadow-sm">
    <div class="card-body">
        <div class="card-block">
            <h4 class="mb-4">Galeri Desa ({{ $galleries->count() }})</h4>
            <form action="" id="gallery-form">
                @csrf
                <div class="form-group row">
                    @if($galleries->count()<6)
                        <div class="col-md-6 mb-2">
                            {{-- <label for="gallery2" class="sr-only">Tambah Galeri</label> --}}
                            <div class="input-file">
                                <span class="btn-upload" target="#gallery2">Tambah Galeri</span>
                                <span class="file-selected"></span>
                                <input type="file" name="gallery" id="gallery2" class="gallery"/>
                            </div>
                            <small class="text-muted d-block">Maksimal foto berjumlah 6 dan maksimal ukuran 3MB</small>
                        </div>
                    @endif
                </div>

                <div class="row" id="thumb-output">
                    @foreach($galleries as $gallery)
                    <div class="thumb_pict col-sm-4">
                        <div class="thumb-img-container">
                            <img class="d-block mb-3" src="{{ asset('storage/'.$gallery->image) }}" />
                        </div>
                        <div class="btn btn-outline-danger btn-sm remove-gallery d-block" data-id="{{ $gallery->id }}">Hapus</div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="row">
                    <div class="col-12 text-right mt-4">
                        <input type="submit" name="" class="btn btn-success" value="Simpan Galeri">
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
</div>