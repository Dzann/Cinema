
@extends('layout.app')
@section('title', 'List-Movies')
@section('body')
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="list-movies.html">MoviePleketeplek</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('movie') }}">
                    List Film
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="transaction-histories.html">
                    Riwayat Transaksi
                </a>
            </li>
        </ul>

    </div>
</nav>

<main class="content py-4">
    <div class="container">
        <h3 class="my-4">List Movie</h3>
        <div class="row">
            @foreach ($movie as $movie)
            <div class="col-3">
                <div class="row d-flex mb-5">
                    <a href="{{ route('formlogin') }}">
                        <img src="{{ $movie->image }}" class="card-img-top" alt="KKN Di Desa Penari" style="height: 300px; object-fit: cover;">
                    </a>
                    <center style="color: rgba(17, 0, 255, 0.623)">
                        <h5 >{{ $movie->name }}</h5>
                        <h5>{{ $movie->genre->name }}</h5>
                    </center>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</main>
@endsection
