@extends('layouts.app')

@section('content')

<div class="container">
    <h4>Edit Data Aset</h4>

    @foreach($data_aset as $data)

    <form action="{{ route('aset.update', $data->id) }}" method="post"  enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="jenis_aset">Jenis Aset</label>
        <input type="text" class="form-control" name="jenis_aset" value="{{ $data->jenis_aset }}">
    </div>
    
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $data->nama }}">
    </div>

    <div class = "form-group">
        <label for="tahun_beli">Tahun Beli</label>
        <input type="date" class="date form-control" name="tahun_beli"
        placeholder="yyyy/mm/dd" id="tahun_beli">
    </div>

    <div class = "form-group">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" name="harga" value="{{ $data->harga }}">
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
    @endforeach
</div>
@endsection