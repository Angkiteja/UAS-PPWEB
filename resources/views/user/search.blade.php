

@if(Session::has('pesan'))
<div class="alert alert-success">{{ Session::get('pesan') }}</div>
@endif

<html>

<head>
    <!-- bootstrap nya -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<h2 align="center">List Users</h2>
<p><a class="btn btn-primary" href="{{ route('users.create') }}">Tambah users</a></p>

@if(count($data_users))
    <div class="alert alert-success">Ditemukan <strong>{{count($data_users)}}</strong> data dengan
    kata: <strong>{{ $cari }}</strong></div>
@else
    <div class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4>
    <a href="/users" class="btn btn-warning">Kembali</a></div>
@endif

<table class="table table-hover" align="center">
    <thead>
        <tr>
            <th>id</th>
            <th>Nama users</th>
          
        </tr>
    </thead>

    <tbody>
        @foreach($data_users as $users)

        <tr>
            <td>{{ $users->id }}</td>
            <!--mengurutkan berdasar id, yg terbaru ada diatas -->
            <!-- <td>{{ ++$no }}</td> mengurutkan berdasar nomor, yg terbaru ada di no 1 -->
            <td>{{ $users->nama_users }}</td>
    
            <td>
                <form action="{{ route('users.destroy', $users->id) }}" method="post">
                    <!-- hapus berdasar id -->
                    @csrf
                    <button onClick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">Hapus</button>
                </form>
                <form method="post" action="{{ route('users.edit', $users->id) }}">
                    @csrf
                    <button onClick="return confirm('Yakin mau edit?')" class="btn btn-warning">Edit</button>
                </form>

                <!-- pertemuan 8 -->
                <form action="{{ route('users.search') }}" method="get">@csrf
                <input type="text" name="kata" class="form-control" placeholder="cari..." style="width: 30%; 
                display:inline; margin-top: 10px; margin-bottom: 10px; float:right;">
                </form>
            </td>
        </tr>

        @endforeach

        <tr>
            <td colspan="5">Banyak data</td>
            <td>: {{ $jumlah_users }}</td>
        </tr>
    </tbody>
</table>


</table>

</html>