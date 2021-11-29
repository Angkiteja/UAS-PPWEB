@extends('layout.master')

@if(Auth::check() && Auth::user()->level == 'admin')

@if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
        @endforeach
    </ul>
@endif

@section('title')
<title>Tambah buku</title>
@endsection

@section('content')
<div class = "container">
       <h4>Tambah Buku</h4>
    <form method="post" action="{{ route('buku.store') }}">

        @csrf
        <!-- merupakan proteksi dari serangan CSRF (Cross Site Request Forgery) yang mencegah penginputan data ilegal dari luar aplikasi/sistem -->

        <table border="0" align="center">
            <tr>
                <td>Judul</td>
                <td><input type="text" name = "judul" id=""></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name = "penulis" id=""></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name = "harga" id=""></td>
            </tr>
            <tr>
                <td>Tanggal terbit</td>
                <!-- <td><input type="text" name = "tgl_terbit" id=""></td> -->

                <!-- pertemuan 8 -->
                <td><input type="text" name = "tgl_terbit" id="tgl_terbit"
                class = "date form-control" placeholder="yyyy/mm/dd"></td>
            </tr>
        </table>

        <div><button type = "submit">Simpan</button></div>
        <a href="/buku">Batal</a>
    </form>
</div>
@endsection
@endif