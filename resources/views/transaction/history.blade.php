@extends('layout.app')

@section('title', 'History Transactions')

@section('body')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">


    @include('layout.navigationbar')

    <div class="container mt-3 mb-5">
        @if (session('message'))
        <div class="alert alert-dark">
            {{ session('message') }}
        </div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <h1 class="my-2">Riwayat Transaksi</h1>
                
                {!! $chart->container() !!}
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('filteredChart') }}" method="get" class="form-group mt-4">
                                    @csrf
                                    <h5 class="text-center">Filter Tanggal</h3>
                                        <label for="" class="mt-2">Tanggal Awal</label>
                                        <input type="date" name="start_date" id="" class="form-control">
                                        <label for="" class="mt-2">Tanggal Akhir</label>
                                        <input type="date" name="end_date" id="" class="form-control">
                                        <button type="submit" href="" class="btn btn-info w-100 mt-4 text-light">Cari Data</button>
                                        {{-- <b class="mt-4">Total Pendapatan : Rp.{{ number_format($total, '0', ',', '.') }}</b> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        @if (auth()->user()->role == 'owner')
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('filterPdf') }}" method="get" class="form-group mt-4">
                                    @csrf
                                    <h5 class="text-center">Filter Download</h3>
                                        <label for="" class="mt-2">Tanggal Awal</label>
                                        <input type="date" name="start_date" id="" class="form-control">
                                        <label for="" class="mt-2">Tanggal Akhir</label>
                                        <input type="date" name="end_date" id="" class="form-control">
                                        <button type="submit" href="" class="btn btn-danger w-100 mt-4">Download
                                            Data</button>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <p class="mt-4">Total Pendapatan :
                    <b>
                        Rp.{{ number_format($total, '0', ',', '.') }}
                    </b>
                </p>
                <table class="table table-bordered mt-3" id="example">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Movie Title</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Seats</th>
                            <th scope="col">Total</th>
                            <th scope="col">Uang</th>
                            <th scope="col">kembalian</th>
                            <!-- Add other history details as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                            <tr>
                                <td>{{ $history->movie->name }}</td>
                                <td>{{ $history->date }}</td>
                                <td>{{ $history->time }}</td>
                                <td>{{ $history->seats }}</td>
                                <td>Rp. {{ number_format($history->total, '0', ',', '.') }}</td>
                                <td>Rp. {{ number_format($history->cash, '0', ',', '.') }}</td>
                                <td>Rp. {{ number_format($history->change, '0', ',', '.') }}</td>
                                <!-- Add other history details as needed -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    @include('layout.footer')
    <script src="{{ $chart->cdn() }}"></script>

    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <script>
        new DataTable('#example');
    </script>

    {{ $chart->script() }}
@endsection
