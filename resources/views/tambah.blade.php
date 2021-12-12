<html>
    <head>

    </head>
    <body>
        <form action="{{route('mahasiswa.store')}}" method="POST">
            @csrf
            <div class="form-group">
            <table border="0">
                <tr>
                    <td>NIM</td>
                    <td><input type ="text" name="nim" class="form-control" placeholder="....."></td>
                </tr>
                <tr>
                    <td>Nama mahasiswa</td>
                    <td><input type ="text" name="nama" class="form-control" placeholder="....."></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><input type ="text" name="jurusan" class="form-control" placeholder="....."></td>
                </tr>
                <!-- 
                    </br>
                <label>Nama mahasiswa</label>
                <input type ="text" name="nama" class="form-control" placeholder=".....">
                </br>
                <label>Jurusan</label>
                <input type ="text" name="jurusan" class="form-control" placeholder="....."> 
                -->
                <br>
                <br>
                </table>
            </div>
            <button type="submit" class="btn btn-primary">Simpan </button>
    </body>
</html>