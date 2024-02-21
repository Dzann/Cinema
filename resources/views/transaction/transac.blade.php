@extends('layout.app')

@section('title', 'Konfirmasi order')

@section('body')
    @extends('layout.navigationbar')

    <div class="container mt-5 col-8">
        <div class="card shadow">
            <div class="row">
                <div class="col-md-6 p-5" style="background-color: #BFE4F6;">
                    <img src="{{ asset('img/logo.png') }}" class="card-img" alt="" style="width: 100%;">
                </div>
                <div class="col-md-6">
                    <h2 style="text-align: center" class="mt-4">Terima Kasih Sudah Memesan </h2>
                    <hr>
                    <div class="card-body p-4 border-2 text-black rounded-4">
                        @if (session('message'))
                            <div class="alert alert-dark">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="row py-1" style="max-width: 400px; margin-left: 50px">
                            <div class="col-6">Film</div>
                            <div class="col text-start">{{ $movie_id }}</div>
                        </div>
                        <div class="row py-1" style="max-width: 400px; margin-left: 50px">
                            <div class="col-6">Nama Film</div>
                            <div class="col text-start">{{ $movie_name }}</div>
                        </div>
                        <div class="row py-1" style="max-width: 400px; margin-left: 50px">
                            <div class="col-6">Waktu</div>
                            <div class="col text-start">{{ $time }}</div>
                        </div>
                        <div class="row py-1" style="max-width: 400px; margin-left: 50px">
                            <div class="col-6">Tempat Duduk</div>
                            <div class="col text-start">{{ $seats }}</div>
                        </div>
                        <hr class="w-100 mt-5">
                        <div class="row py-1" style="w-100">
                            <div class="col-6 text-center"><b>Kembalian</b></div>
                            <div class="col text-center text-danger"><b>Rp. {{ number_format($kembalian, 0, ',', '.') }}</b>
                            </div>
                        </div>
                        <hr style="w-100 "/>
                        <div class="d-flex gap-1">
                            <a href="{{ route('movie') }}" class="btn btn-info w-100">Kembali Ke Menu</a>
                            <a href="{{ route('ticket', ['id_movie' => $movie_id, 'seats' => $seats, 'time' => $time]) }}"
                                class="btn btn-secondary w-100">Print Ticket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer font-small blue fixed-bottom" style="">
        <div class="footer-copyright text-center py-3">© 2024 Copyright:
            <a href="mailto:muhammadgidzane@gmail.com"> muhammadgidzane@gmail.com</a>
        </div>
    </footer>
@endsection
