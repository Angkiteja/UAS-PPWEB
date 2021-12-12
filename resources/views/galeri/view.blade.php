@extends('layouts.app')

@if(Session::has('pesanSimpan'))
<div class="alert alert-success">{{ Session::get('pesanSimpan') }}</div>
@endif

@if(Session::has('pesanEdit'))
<div class="alert alert-success">{{ Session::get('pesanEdit') }}</div>
@endif

@if(Session::has('pesanHapus'))
<div class="alert alert-success">{{ Session::get('pesanHapus') }}</div>
@endif

<html>

<head>
    <!-- bootstrap nya -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

@section('content')
@if(Auth::check() && Auth::user()->level == 'admin')
<h2 align="center">Galeri Aset</h2>

<p><a class="btn btn-primary" href="{{ route('galeri.create') }}" style="margin-left: 135px;">Tambah Galeri Aset</a></p>

<table class="table table-dark" align="center" style="width: 80%;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Galeri</th>
            <th>Nama Aset</th>
            <th>Isi Galeri</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($galeri as $data)     
        <tr>
           <td>{{ ++$no }}</td>
            <td>{{ $data->nama_galeri }}</td>
            <td>{{ $data->bukus->judul }}</td>
            <td><img src="{{ asset('thumb/'.$data->foto) }}" style="width: 100px;">{{ $data->isi_galeri }}</td>
            
            <td>
                <form action="{{ route('galeri.destroy', $data->id) }}" method="post">
                    <!-- hapus berdasar id -->
                    @csrf

                    <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-info">
                    <i class="fa fa-pencil-alt"></i>Edit</a>

                    <button onClick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">
                    <i class="fa fa-times"></i>Hapus</button>
                </form>              
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
<div style="margin-left: 135px;">{{ $galeri -> links() }}</div>
    <div style="margin-left: 135px;"><strong>Jumlah galeri yang ditambahkan : {{ $jumlah_galeri }}</strong></div>
@endsection
@endif

</html>