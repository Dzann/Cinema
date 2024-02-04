@extends('layout.app')

@section('title', 'Ganti password')
    
@section('body')
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="list-movies.html">OriCinema</a>
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
                            <button type="submit" class="btn btn-warning">
                                Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection