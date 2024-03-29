@extends('layout.app')
@section('title', 'List-Movies')
@section('body')
    @include('layout.navigationbar')

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img style="card-img-top" src="{{ asset($movie_image) }}" width="300">
                    </div>
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body">
                                <h1>{{ $movie_name }}</h1>
                                <p class="text-dark">Genre : <b class="text-danger">{{ $movie->genre->name }}</b></p>
                                <p class="text-dark">Studio : <b class="text-danger">{{ $movie->studio_name }}</b></p>
                                <p class="text-dark">Direktur : <b class="text-danger">{{ $movie->director }}</b></p>
                                <p class="text-dark">Waktu Film : <b class="text-danger">{{ $movie->minutes }} Menit</b></p>
                                <b class="card-title">Sinopsis : </b>
                                <p class="card-text">{{ $movie->deskripsi }}</p>
                                <hr class="mt-5">
                                <div class="d-flex">
                                    <a href="{{ route('seatSelection', ['movie_id' => $movie->id, 'time' => '13:00']) }}"
                                        class="btn btn-info me-3 text-light">13:00</a>
                                    <a href="{{ route('seatSelection', ['movie_id' => $movie->id, 'time' => '16:00']) }}"
                                        class="btn btn-info me-3 text-light">16:00</a>
                                    <a href="{{ route('seatSelection', ['movie_id' => $movie->id, 'time' => '19:00']) }}"
                                        class="btn btn-info me-3 text-light">19:00</a>
                                    <a href="{{ route('seatSelection', ['movie_id' => $movie->id, 'time' => '21:00']) }}"
                                        class="btn btn-info me-3 text-light">21:00</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-2"></div> --}}
                </div>
            </div>
        </div>
        <footer class="page-footer font-small blue fixed-bottom" style="">
            <div class="footer-copyright text-center py-3">© 2024 Copyright:
                <a href="mailto:muhammadgidzane@gmail.com"> muhammadgidzane@gmail.com</a>
            </div>
        </footer>

    @endsection
