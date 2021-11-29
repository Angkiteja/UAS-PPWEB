@extends('layouts.app')

@section('content')
@if(Auth::check() && Auth::user()->level == 'admin')

 <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head> 

<body>
<b><p class="fs-3" align="center">Buku</p></b>
    <div class="container">
        <div class="row">
            @foreach ($data_buku as $buku)
            <div class="col-md-2">
                <div align="center" class="card" style="width: 10rem;">
                    <div class="card-body">
                        <img class="card-img-top" src="{{ asset('thumb/'.$buku->foto) }}" style="width:100px; height:150px">{{ $buku->isi_galeri }}
                        <hr>
                        <a href="{{ route('galeri.buku', $buku->buku_seo)  }}">{{ $buku->judul }} </a>
                        <hr>
                        <a href="{{ route('likefoto', $buku->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-thumbs-up"></i>like
                            <span class="badge badge-light"> {{ $buku->like_foto }}</span>
                        <br>
                        <a href="#" class="btn btn-info btn-sm">
                            <i class="fa fa-thumbs-up"></i>Komentar
                            <span class="badge badge-light"> {{ $buku->suka }}</span>
                        </a>
                    </div>  
                </div>
            </div>
            @endforeach
        <!-- <h2>Contoh Card dengan Image</h2> -->
        <!-- <hr/> -->
        </div>
    </div>
    <div style="float: right;">
        {{ $data_buku->links() }}
    </div>
</body>
@endsection
@endif