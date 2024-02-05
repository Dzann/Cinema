@extends('layout.app')

@section('title', 'History Transactions')

@section('body')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">


    @include('layout.navigationbar')

    <div class="container mt-3 mb-5">
        <h1 class="my-2">Histories</h1>
        <div class="row">
            <div class="col-8">
                {!! $chart->container() !!}
            </div>
            <div class="col-4">
                <form action="{{ route('filteredChart') }}" method="get" class="form-group mt-4">
                    @csrf
                    <label for="" class="mt-2">Tanggal Awal</label>
                    <input type="date" name="start_date" id="" class="form-control">
                    <label for="" class="mt-2">Tanggal Akhir</label>
                    <input type="date" name="end_date" id="" class="form-control">
                    <button type="submit" href="" class="btn btn-warning w-100 mt-3">Cari Data</button>
                </form>
            </div>
        </div>
        <table class="table table-bordered mt-3" id="example">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Movie Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Seats</th>
                    <th scope="col">Total</th>
                    <th scope="col">Cash</th>
                    <th scope="col">Change</th>
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
                        <td>Rp. {{ $history->total }}</td>
                        <td>Rp. {{ $history->cash }}</td>
                        <td>Rp. {{ $history->change }}</td>
                        <!-- Add other history details as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



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
