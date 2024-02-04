@extends('layout.app')

@section('title', 'Konfirmasi order')

@section('body')


<main class="content py-4">
    <div class="container">
        <h3 class="my-4">Konfirmasi Pemesanan</h3>

        <form action="{{ route('createOrder') }}" method="POST">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
        <input type="hidden" name="movie_name" value="{{ $movie->name }}">
        <input type="hidden" name="time" value="{{ $time }}">
        <input type="hidden" name="total" value="{{ $total }}">
        <input type="hidden" name="seats" value="{{ $seats }}">
            <div class="row py-1" style="max-width: 400px">
                <div class="col-6">Film</div>
                <div class="col text-start">{{ $movie->name }}</div>
            </div>
            <div class="row py-1" style="max-width: 400px">
                <div class="col-6">Waktu</div>
                <div class="col text-start">{{ $time }}</div>
            </div>
            <div class="row py-1" style="max-width: 400px">
                <div class="col-6">Tempat Duduk</div>
                <div class="col text-start">{{ $seats }}</div>
            </div>
            <div class="row py-1" style="max-width: 400px">
                <div class="col-6">Studio</div>
                <div class="col text-start">{{ $movie->studio_name }}</div>
            </div>
            <hr style="max-width: 400px" />
            <div class="row py-1" style="max-width: 400px">
                <div class="col-6 text-start">Harga Tiket</div>
                <div class="col text-start">Rp 50.000 x {{ $count }}</div>
            </div>
            <div class="row py-1" style="max-width: 400px">
                <div class="col-6 text-start">Biaya Layanan</div>
                <div class="col text-start">Rp 2.000</div>
            </div>
            <hr style="max-width: 400px" />
            <div class="row py-1" style="max-width: 400px">
                <div class="col-6 text-start"><b>Total Bayar</b></div>
                <div class="col text-start"><b>{{ $total }}</b></div>
            </div>
            <hr style="max-width: 400px" />
            <div class="row py-1 d-flex align-items-center" style="max-width: 400px">
                <div class="col-6 text-start"><b>Jumlah Uang</b></div>
                <div class="col text-start">
                    <input type="number" name="cash" class="form-control" autofocus />
                </div>
            </div>

            <button type="submit" class="btn btn-warning my-5">Bayar</button>
            @if (Session::has('notif'))
                <h5>{{ Session::get('notif') }}</h5>
            @endif
        </form>
    </div>
</main>
@endsection





