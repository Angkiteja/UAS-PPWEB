@extends('layouts.app')

@if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
        @endforeach
    </ul>
@endif

@section('title')
<title>Tambah User</title>
@endsection

@section('content')
<div class = "container">
       <h4>Tambah User</h4>
    <form method="post" action="{{ route('user.store') }}">

        @csrf
        <!-- merupakan proteksi dari serangan CSRF (Cross Site Request Forgery) yang mencegah penginputan data ilegal dari luar aplikasi/sistem -->
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name = "name" id="name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name = "email" id="email"></td>
            </tr>
            
            <tr>
                <td>Password</td>
                <td><input type="password" required="required" name = "password" id="password"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name = "confirm_password" id="confirm_password"></td>
            </tr>
            <tr>
                <td>Level</td><br>
                <td><input type="radio" name="level" value="Admin" {{ $user->level == "Admin" ? 'checked' : '' }}>Admin</td>
                <td><input type="radio" name="level" value="User" {{ $user->level == "User" ? 'checked' : '' }}>User</td>
            </tr>
        </table>
        <div><button type = "submit">Simpan</button></div>
        <a href="/user">Batal</a>
    </form>
</div>
@endsection