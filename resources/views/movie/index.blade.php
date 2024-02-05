@extends('layout.app')
@section('title', 'List-Movies')
@section('body')
    @include('layout.navigationbar')
    <main class="content py-4">
        <div class="container">
            <h3 class="my-4">List Movie</h3>
            <div class="row">
                <h5>On Going Movie</h5>
                @foreach ($movie as $cinema)
                    @if ($cinema->status == 'ongoing')
                        <div class="col-4">
                            <div class="row d-flex mb-5">
                                <center>
                                    @if (!auth()->user())
                                        <div class="card">
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
                                        <div class="card">
                                            <a href="{{ route('detailmovie', $cinema->id) }}"
                                                style="text-decoration: none; color:rgb(202, 115, 10)" class="gagambar">
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
        </div>
    </main>
@endsection
