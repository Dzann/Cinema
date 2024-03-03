@extends('layout.app')

@section('title', 'Tambah User')

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">
@section('body')

@include('layout.navigationbar')
    <div class="container mt-5">
        <div class="card">
            <h3 class="text-center mt-2">Tambah User</h3>
            <div class="card-body">
                <form action="{{ route('editUser', $user->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="">Username</label>
                    <input type="text" name="username"class="form-control" value="{{ $user->username }}" required>
                    <label for="">password</label>
                    <input type="password" name="password"class="form-control" placeholder="Mohon isi kembali password atau ubah password" required>
                    <label for="">Role</label>
                    <select name="role" id="" class="form-control">
                        <option value="user">kasir</option>
                        <option value="owner">Owner</option>
                    </select>
                    @if (session('message'))
                        <div class="alert alert-dark">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="mt-4">
                        <button class="btn btn-info">Edit Data</button>
                        <a href="{{ route('formUser') }}" class="btn btn-secondary">Cancel (back)</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src={{ asset('js/jquery.js') }}></script>
    <script src={{ asset('js/bootstrap.js') }}></script>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>

@endsection
