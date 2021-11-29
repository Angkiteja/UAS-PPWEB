@extends('layouts.app')
<html>
    <head>
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    </head>
    @section('content')
    <body>
        <a href="{{route('mahasiswa.create')}}" class="float-left btn btn-primary">Tambah</a>
        <br>
        <br>
        <h2 align="center">List Mahasiswa</h2>
        
        

    <table border = "1" align="center">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Action</th>
        </tr>

        @foreach ($mahasiswa as $item)
        <tr>
            <td>{{$item->nim}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jurusan}}</td>
        </tr>
        @endforeach
    </table>

    </body>
    @endsection
</html>