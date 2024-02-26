{{-- @extends('layout.app')

@section('title', 'Ganti password')
    
@section('body')
<nav class="navbar navbar-expand-lg bg-info text-dark">
    <div class="container">
        <a class="navbar-brand" href="list-movies.html">Aniplex</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('movie') }}">
                    List Film
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->username }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('changePassword') }}">Ubah Password</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>

                </div>
            </li>
        </ul>
    </div>
</nav>

<main class="content py-4">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card my-4">
                    <div class="card-body">
                        <h5 class="mb-3">Ubah Password</h5>
                        <form action="{{ route('updatePassword') }}"method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="new_password" class="mb-2">New Password</label>
                                <input
                                    type="password"
                                    name="new_password"
                                    class="form-control"
                                    autofocus
                                />
                            </div>
                            <div class="form-group mb-4">
                                <label for="new_password_confirmation" class="mb-2"
                                >New Password Confirmation</label
                                >
                                <input
                                    type="password"
                                    name="new_password_confirmation"
                                    class="form-control"
                                />
                            </div>
                            <button type="submit" class="btn btn-info">
                                Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection --}}

@extends('layout.app')

@section('title', 'login')

@section('body')
@include('layout.navigationbar')
    <div class="container mt-5 col-8">
        <form action="{{ route('updatePassword') }}" method="POST" class="form-gorup">
            @csrf
            <div class="card shadow">
                <div class="row">
                    <div class="col-md-6 p-5" style="background-color: #BFE4F6;">
                        <img src="{{ asset('img/logo.png') }}" class="card-img" alt="" style="width: 100%;">
                    </div>
                    <div class="col-md-6">
                        <h1 style="text-align: center" class="mt-4"> AniPlex Cinema </h1>
                        <hr>
                        <div class="card-body p-4 border-2 text-black rounded-4">
                            <h3 class="text-center"> Ubah Password </h3>
                            @if (session('message'))
                                <div class="alert alert-dark">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="new_password" id="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="new_password_confirmation" id="password" class="form-control">
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-info text-light w-100"> Ubah Password </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
