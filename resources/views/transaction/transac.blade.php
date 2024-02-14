@extends('layout.app')

@section('title', 'Konfirmasi order')

@section('body')
    @extends('layout.navigationbar')
    <main class="container py-4">

        <center>
            <main class="content py-4">
                <div class="container">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif
                    <h3 class="my-4">Terimakasih Sudah Memesan</h3>
                    <div class="card" style="width: 400px">
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
                        <hr style="max-width: 400px" />
                        <div class="row py-1" style="max-width: 400px">
                            <div class="col-6 text-start " style="margin-left: 50px"><b>Kembalian</b></div>
                            <div class="col text-start text-danger"><b>{{ $kembalian }}</b></div>
                        </div>
                        <hr style="max-width: 400px" />
                        <a href="{{ route('movie') }}" class="btn btn-info">Kembali Ke Menu</a>
                        <a href="{{ route('ticket', ['id_movie'=> $movie_id, 'seats' => $seats, 'time' => $time]) }}" class="btn btn-secondary mt-1">Print Ticket</a>
                    </div>
                </div>
            </main>
        </center>
    </main>
@endsection
