@extends('layout.app')

@section('title', 'History Transactions')

@section('body')
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">

    @include('layout.navigationbar')

    <div class="container mt-2 mb-4">
        <h1>Log Activity</h1>

        <form action="{{ route('filter') }}" method="get" class="form-group mt-4">
            @csrf
            <div class="row mb-3">
                <div class="col-4">
                    <label for="" class="">Tanggal Awal</label>
                    <input type="date" name="start_date" id="" class="form-control">
                </div>
                <div class="col-4">
                    <label for="" class="">Tanggal Akhir</label>
                    <input type="date" name="end_date" id="" class="form-control">
                </div>
            </div>
            <button type="submit" href="" class="btn btn-info mb-4">Cari Data</button>
        </form>
        <table class="table table-bordered mt-3" id="example">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Log Activity</th>
                    <th scope="col">Date time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->user->username }}</td>
                        <td>{{ $log->user->username }} {{ $log->activity }}</td>
                        <td>{{ \Carbon\Carbon::parse($log->created_at)->format('Y-m-d H-i-s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <script>
        new DataTable('#example');
    </script>

@endsection
