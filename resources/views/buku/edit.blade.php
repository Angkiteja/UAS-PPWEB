@extends('layout.master')

@if(Auth::check() && Auth::user()->level == 'admin')
 
@section('content')
    <div class = "container">
        <h4>Edit Buku</h4>
        @foreach($data_buku as $book)
        <form method="post" action="{{ route('buku.update', $book->id) }}">
        
            @csrf
            <!-- merupakan proteksi dari serangan CSRF (Cross Site Request Forgery) yang mencegah penginputan data ilegal dari luar aplikasi/sistem -->
            <table border="0" align="center">
                <tr>
                    <td>Judul</td> 
                    <td><input type="text" name = "judul" value = "{{ $book->judul}} "></td>
                </tr>
                <tr>
                    <td>Penulis </td>
                    <td><input type="text" name = "penulis" value = "{{ $book->penulis }}"></td>
                </tr>
                <tr>
                    <td>Harga </td>
                    <td><input type="text" name = "harga" value = "{{ $book->harga }}"></td>
                </tr>
                <tr>
                    <!-- <td>Tanggal terbit <input type="date" name = "tgl_terbit" value = "{{ $book->tgl_terbit }}"></td> -->
                     <!-- pertemuan 8 -->
                    <td>Tanggal terbit</td>
                    <td> <input type="text" name = "tgl_terbit" id="tgl_terbit" 
                    class = "date form-control" placeholder="yyyy/mm/dd">
                    </td>
                </tr>
            </table>   
            
            <div><button type = "submit">Simpan</button></div>
            <a href="/buku">Batal</a>
        </form>
        @endforeach
    </div>
@endsection
@endif