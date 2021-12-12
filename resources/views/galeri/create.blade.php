@extends('layouts.app')

@section('content')
<form action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nama_galeri">Nama Galeri</label>
        <input type="text" class="form-control" name="nama_galeri">
    </div>
    <div class="form-group">
        <label for="id_buku">Aset</label>
        <select name="id_buku" class="form-control">
            <option value="" selected>Pilih Aset</option>
            @foreach($buku as $data)
                <option value="{{ $data->id }}">{{ $data->judul }}</option>    
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" class="form-control"></textarea>
    </div>
    <!-- <div class="form-group">
        <label for="buku_seo">Buku SEO</label>
        <textarea name="buku_seo" class="form-control" value="{{ $data->galeri_seo }}"></textarea>
    </div> -->
    <div class="form-group">
        <label for="foto">Upload Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/galeri" class="btn btn-warning">Batal</a>
    </div>
</form>
@endsection