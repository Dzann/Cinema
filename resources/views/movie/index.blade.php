@extends('layout.app')
@section('title', 'List-Movies')
@section('body')
    <style>
        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 0px
        }
    </style>
    @include('layout.navigationbar')
    <main class="content py-4">
        <div class="container">
            <h3 class="text-center my-4">List Movie</h3>
            <div class="row">
                <h5>On Going Movie</h5>
                @foreach ($movie as $cinema)
                    @if ($cinema->status == 'ongoing')
                        <div class="col-4">
                            <div class="row d-flex mb-5">
                                <center>
                                    @if (!auth()->user())
                                        <div class="card shadow">
                                            <a href="{{ route('login') }}"
                                                style="text-decoration: none; color:rgb(202, 115, 10)" class="gagambar">
                                                <img src="{{ $cinema->image }}" class="card-img-top" alt=""
                                                    style="height: 500px; object-fit: cover; ">
                                                <h3 class="mt-2">{{ $cinema->name }}</h3>
                                                <h5 style="opacity:70%">{{ $cinema->genre->name }}</h5>
                                            </a>
                                        </div>
                                    @endif
                                    @if (auth()->user())
                                        <div class="card shadow">
                                            <a href="{{ route('detailmovie', $cinema->id) }}"
                                                style="text-decoration: none; color:black" class="gagambar">
                                                <img src="{{ $cinema->image }}" class="card-img-top" alt=""
                                                    style="height: 500px; object-fit: cover; ">
                                                <h3 class="mt-2">{{ $cinema->name }}</h3>
                                                <h5 style="opacity:70%">{{ $cinema->genre->name }}</h5>
                                            </a>
                                        </div>
                                    @endif
                                </center>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            @if (auth()->user())
                <div class="row">
                    <h5>UpComing Movie</h5>
                    @foreach ($movie as $movie)
                        @if ($movie->status == 'upcoming')
                            <div class="col-4">
                                <div class="row d-flex mb-5">
                                    <center>
                                        <div class="card shadow">
                                            <div style="pointer-events: none">
                                                <a href="{{ route('detailmovie', $movie->id) }}"
                                                    style="text-decoration: none; color:black" class="gagambar">
                                                    <img src="{{ $movie->image }}" class="card-img-top" alt=""
                                                        style="height: 500px; object-fit: cover; ">
                                                    <h3 class="mt-2">{{ $movie->name }}</h3>
                                                    <h5 style="opacity:70%">{{ $movie->genre->name }}</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </main>
@endsection
