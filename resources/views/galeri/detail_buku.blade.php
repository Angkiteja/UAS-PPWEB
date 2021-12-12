<!-- <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head> -->
@extends('layouts.app')

@section('content')
<section id="album" class="py-1 text-center gb-light">
    <div class="container">
    <h2>Aset: {{$bukus->judul}}</h2>
    <hr>
    <div class="row">
        @foreach ($galeris as $data)
        <div class="col-md-4">
        <a href="{{ asset('thumb/'.$data->foto) }}"
        data-lightbox="image-1" data-title="{{ $data->keterangan }}">
            <img src="{{ asset('thumb/'.$data->foto) }}" style="width:210px; height:340px">
        </a>

        <p><h5>{{ $data->keterangan }}</h5></p>
        </div>
        @endforeach
    </div>
    <div>{{ $galeris->links() }}</div>
    </div>

</section>
@endsection