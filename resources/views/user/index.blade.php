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

<h2 align="center">List User</h2>
<p><a class="btn btn-primary" href="{{ route('user.create') }}" style="margin-left: 135px;">Tambah User</a></p>

@if(Auth::check() && Auth::user()->level == 'admin')
<table class="table table-dark" align="center" style="width: 80%;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data_user as $user)
        
        <tr>
            <td>{{ ++$no }}</td>  <!-- mengurutkan berdasar no, yg terbaru ada diatas -->
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->level }}</td>
            <td>
                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                    <!-- hapus berdasar id -->
                    @csrf
                    <button onClick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">Hapus</button>
                </form>
                <form method="post" action="{{ route('user.edit', $user->id) }}">
                    @csrf
                    <button onClick="return confirm('Yakin mau edit?')" class="btn btn-warning">Edit</button>
                </form>

                
            </td>
        </tr>

        @endforeach
        <tr>
            <td colspan="4">Banyak data</td>
            <td>: {{ $jumlah_user }}</td>
        </tr>

    </tbody>
</table>
    <div style="margin-left: 135px;">{{ $data_user -> links() }}</div>
    <div style="margin-left: 135px;"><strong>Jumlah User : {{ $jumlah_user }}</strong></div>
@endsection
@endif

</html>