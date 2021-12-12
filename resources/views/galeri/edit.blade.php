@extends('layouts.app')

@section('content')

<div class="container">
    <h4>Edit Galeri</h4>

    @foreach($galeri as $data)

    <form action="{{ route('galeri.update', $data->id) }}" method="post"  enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="nama_galeri">Judul</label>
        <input type="text" class="form-control" name="nama_galeri" value="{{ $data->nama_galeri }}">
    </div>
    
    <div class="form-group">
        <!-- <label for="id_buku">Buku</label>
        <select name="id_buku" class="form-control">
        
            <option value="" selected>Pilih Buku</option>
                <option value="{{ $data->id }}">{{ $data->judul }}</option>    
        </select> -->
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" class="form-control" value="{{ $data->keterangan }}"></textarea>
    </div>

    <div class="form-group">
        <label for="buku_seo">Buku SEO</label>
        <textarea name="buku_seo" class="form-control" value="{{ $data->buku_seo }}"></textarea>
    </div>

    <div class="form-group">
        <label for="foto">Upload Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/galeri" class="btn btn-warning">Batal</a>

    </div>



    </form>
</div>
@endforeach

@endsection