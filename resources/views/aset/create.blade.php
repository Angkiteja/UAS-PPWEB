@extends('layouts.app')

@if(Auth::check() && Auth::user()->level == 'admin')

@if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
        @endforeach
    </ul>
@endif

@section('title')
<title>Tambah Aset</title>
@endsection


@section('content')
<form method="post" action="{{ route('aset.store') }}" enctype="multipart/form-data">
   @csrf
        <!-- merupakan proteksi dari serangan CSRF (Cross Site Request Forgery) yang mencegah penginputan data ilegal dari luar aplikasi/sistem -->
    <div class = "form-group">
        <label for="jenis_aset">Jenis Aset</label>
        <input type="text" class="form-control" name="jenis_aset">
    </div>

    <div class = "form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>

    <div class = "form-group">
        <label for="tahun_beli">Tahun Beli</label>
        <input type="date" class="date form-control" name="tahun_beli"
        placeholder="yyyy/mm/dd" id="tahun_beli">
    </div>

    <div class = "form-group">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" name="harga">
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
@endsection
@endif