@extends('layouts.app')
@if(Auth::check() && Auth::user()->level == 'admin')

@if(Session::has('pesan'))
<div class="alert alert-success">{{ Session::get('pesan') }}</div>
@endif

<html>

<head>
    <!-- bootstrap nya -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
@section('content')
<h2 align="center">Inspirational Book</h2>
<p><a class="btn btn-primary" href="{{ route('buku.create') }}">Tambah Buku</a></p>

@if(count($data_buku))
    <div class="alert alert-success">Ditemukan <strong>{{count($data_buku)}}</strong> data dengan
    kata: <strong>{{ $cari }}</strong></div>
@else
    <div class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4>
    <a href="/buku" class="btn btn-warning">Kembali</a></div>
@endif

<table class="table table-hover" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <form action="{{ route('buku.search') }}" method="get">@csrf
                <input type="text" name="kata" class="form-control" placeholder="cari..." style="width: 30%; 
                display:inline; margin-top: 10px; margin-bottom: 10px; float:right;">
                </form>
        @foreach($data_buku as $buku)

        <tr>
            <td>{{ ++$no }}</td>
            <!--mengurutkan berdasar id, yg terbaru ada diatas -->
            <!-- <td>{{ ++$no }}</td> mengurutkan berdasar nomor, yg terbaru ada di no 1 -->
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->penulis }}</td>

            <td>{{ "Rp ".number_format($buku->harga, 0, ',','.') }}</td>
            <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>

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

                <!-- pertemuan 8 -->
                
            </td>
        </tr>

        @endforeach

        <div>{{ $data_buku -> links() }}</div>
        <div><strong>Jumlah Buku : {{ $jumlah_buku }}</strong></div>

@endif
    </tbody>
</table>


</table>

</html>
@endsection