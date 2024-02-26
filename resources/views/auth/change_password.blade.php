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
