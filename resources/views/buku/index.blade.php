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
<h2 align="center">Daftar Aset Anda</h2>
<p><a class="btn btn-primary" href="{{ route('buku.create') }}" style="margin-left: 135px;">Tambah Aset</a></p>
<p><a class="btn btn-primary" href="{{ route('list_buku') }}" style="margin-left: 135px;">Lihat Aset dalam Galeri</a></p>

<table class="table table-dark" align="center" style="width: 80%;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Jenis Aset</th>
            <th>Harga</th>
            <th>Tanggal Beli</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <!-- pertemuan 8 -->
    <form action="" method="post">
    @csrf
                <input type="text" name="kata" class="form-control" placeholder="cari..." style="width: 20%; 
                display:inline; margin-top: 10px; margin-bottom: 10px; margin-right:135px; float:right;">
                <button class="btn btn-success" type="submit">cari</button>
               
    </form>
        @foreach($data_buku as $buku)
        
        <tr>
            <!-- <td>{{ $buku->id }}</td> mengurutkan berdasar id, yg terbaru ada diatas -->
            
            <td>{{ ++$no }}</td> <!-- mengurutkan berdasar nomor, yg terbaru ada di no 1 -->
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->penulis }}</td>

            <!-- <td>{{ "Rp ".number_format($buku->harga, 2, ',','.') }}</td>
            <td>{{ Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y') }}</td> -->

            <!-- pertemuan 8 -->
            <td>{{ "Rp ".number_format($buku->harga, 0, ',','.') }}</td> 
            <!--0 adalah banyak angka dibelakang koma -->
            <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
            <td>
                <img class="card-img-top" src="{{ asset('thumb/'.$buku->foto) }}" style="width:200px; height:200px">{{ $buku->isi_galeri }}
            </td>

            <td>
                <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                    <!-- hapus berdasar id -->
                    @csrf
                    <button onClick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">Hapus</button>
                </form>
                <form method="post" action="{{ route('buku.edit', $buku->id) }}">
                    @csrf
                    <button onClick="return confirm('Yakin mau edit?')" class="btn btn-warning">Edit</button>
                </form>

                
            </td>
        </tr>

        @endforeach
        <tr>
            <td colspan="6">Banyak Aset</td>
            <td>: {{ $jumlah_buku }}</td>
        </tr>
        <tr>
            <td colspan="6">Total harga</td>
            <td>: {{"Rp ".number_format($total, 2, ',', '.')}}</td>
        </tr>

    </tbody>
</table>
    <div>{{ $data_buku -> links() }}</div>
    <div><strong>Jumlah Aset Terdaftar : {{ $jumlah_buku }}</strong></div>
@endsection
@endif
</html>