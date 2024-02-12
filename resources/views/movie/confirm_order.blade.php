@extends('layout.app')

@section('title', 'Konfirmasi order')

@section('body')

    @include('layout.navigationbar')

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <main class="content py-4">
        <div class="container">
            <div class="card rounded col-4 mx-auto shadow p-4 mt-5 mb-5">
                <h3 class="text-center mb-3">Konfirmasi Pemesanan</h3>
                <form action="{{ route('createOrder') }}" id="createOrder" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="movie_id" id="movie" value="{{ $movie->id }}">
                    <input type="hidden" name="movie_name" value="{{ $movie->name }}">
                    <input type="hidden" name="time" id="time" value="{{ $time }}">
                    <input type="hidden" name="total" value="{{ $total }}">
                    <input type="hidden" name="seats" value="{{ $seats }}">
                    <!-- Tambahkan id="time_choose" untuk elemen input -->
                    <div class="row py-1" style="max-width: 400px">
                        <div class="col-6">Film</div>
                        <div class="col text-start">{{ $movie->name }}</div>
                    </div>
                    <!-- Tambahkan id="time_choose" untuk elemen input -->
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
                            <input id="uangBayar" type="number" name="cash" class="form-control" autofocus />
                        </div>
                    </div>
                </form>
                <button type="submit" class="btn btn-warning mt-4" onclick="cekBayar()">Bayar</button>
            </div>
        </div>
    </main>
    <script>
        let uangBayar = document.getElementById('uangBayar');
        let createOrder = document.getElementById('createOrder');
        let totalBayar = {{ $total }}
        function cekBayar() {
            if (uangBayar.value > totalBayar) {
                createOrder.submit();
            } else {
                alert('Uang anda kurang');
                return false;
            }
        }
    </script>
    
@endsection
