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
<h2 align="center">Daftar Kekayaan</h2>
<p><a class="btn btn-primary" href="{{ route('aset.create') }}" style="margin-left: 135px;">Tambah Aset</a></p>
<p><a class="btn btn-primary" href="{{ route('list_aset') }}" style="margin-left: 135px;">List Aset</a></p>
<table class="table table-dark" align="center" style="width: 80%;">
    <thead>
        <tr align="center">
            <th>No.</th>
            <th>Jenis Aset</th>
            <th >Nama</th>
            <th>Tahun Beli</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <!-- pertemuan 8 -->
    <form action="{{ route('aset.search') }}" method="get">@csrf
                <input type="text" name="kata" class="form-control" placeholder="cari..." style="width: 20%; 
                display:inline; margin-top: 10px; margin-bottom: 10px; margin-right:135px; float:right;">
                </form>
        @foreach($data_aset as $aset)
        
        <tr align="center">
            <!-- <td>{{ $aset->id }}</td> mengurutkan berdasar id, yg terbaru ada diatas -->
            
            <td>{{ ++$no }}</td> <!-- mengurutkan berdasar nomor, yg terbaru ada di no 1 -->
            <td>{{ $aset->jenis_aset }}</td>
            <td>{{ $aset->nama }}</td>

            <!-- <td>{{ "Rp ".number_format($aset->harga, 2, ',','.') }}</td>
            <td>{{ Carbon\Carbon::parse($aset->tgl_terbit)->format('d/m/Y') }}</td> -->
            <td>{{ $aset->tahun_beli->format('d/m/Y') }}</td>
            <td>{{ "Rp ".number_format($aset->harga, 0, ',','.') }}</td> 
            <!--0 adalah banyak angka dibelakang koma -->
            <td>
                <img class="card-img-top" src="{{ asset('thumb/'.$aset->foto) }}" style="width:150px; height:150px">{{ $aset->isi_galeri }}
            </td>

            <td>
                <form action="{{ route('aset.destroy', $aset->id) }}" method="post">
                    <!-- hapus berdasar id -->
                    @csrf
                    <button onClick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">Hapus</button>
                </form>
                <form method="post" action="{{ route('aset.edit', $aset->id) }}">
                    @csrf
                    <button onClick="return confirm('Yakin mau edit?')" class="btn btn-warning">Edit</button>
                </form>

                
            </td>
        </tr>

        @endforeach
        <tr>
            <td colspan="6">Banyak Aset</td>
            <td>: {{ $jumlah_aset }}</td>
        </tr>
        <tr>
            <td colspan="6">Total harga</td>
            <td>: {{"Rp ".number_format($total, 2, ',', '.')}}</td>
        </tr>

    </tbody>
</table>
    <div>{{ $data_aset -> links() }}</div>
    <div><strong>Jumlah Aset : {{ $jumlah_aset }}</strong></div>
@endsection
@endif
</html>