
@extends('layout.app')
@section('title', 'List-Movies')
@section('body')
@include('layout.navigationbar')
<style>
    .card:hover{
        transform: scale(1.05);
        box-shadow: 0 4px 8px
    }
    .card{
        box-shadow: 0 1px 5px
    }
</style>
<main class="content py-4">
    <div class="container">
        <h3 class="my-4">List Movie</h3>
        <div class="row">
            @foreach ($movie as $movie)
            <div class="col-4">
                <div class="row d-flex mb-5">
                    <center>
                        @if (!auth()->user())
                        <div class="card">
                            <a href="{{ route('login') }}" style="text-decoration: none; color:rgb(202, 115, 10)" class="gagambar">
                                <img src="{{ $movie->image }}" class="card-img-top" alt="" style="height: 500px; object-fit: cover; ">
                                <h3 class="mt-2">{{ $movie->name }}</h3>
                                <h5 style="opacity:70%">{{ $movie->genre->name }}</h5>
                            </a>
                        </div>
                        @endif
                        @if (auth()->user())
                        <div class="card">
                            <a href="{{ route('detailmovie',$movie->id) }}" style="text-decoration: none; color:rgb(202, 115, 10)" class="gagambar">
                                <img src="{{ $movie->image }}" class="card-img-top" alt="" style="height: 500px; object-fit: cover; ">
                                <h3 class="mt-2">{{ $movie->name }}</h3>
                                <h5 style="opacity:70%">{{ $movie->genre->name }}</h5>
                            </a>
                        </div>
                        @endif
                    </center>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
