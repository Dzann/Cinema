<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">

    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <title>Admin Dashboard</title>
    <style>
    </style>
</head>

<body>
    @include('layout.navigationbar')

    {{-- /GAK BERFUNGSI/ --}}
    {{-- <form action="{{ route('deleteterpilih') }}" method="POST" id="deleteForm">
        @csrf
        <button type="button" id="checkAllBtn" class="btn btn-primary">Check All</button>
        <button type="button" id="uncheckAllBtn" class="btn btn-warning">Uncheck All</button>
        <button type="submit" class="btn btn-danger" onclick="return-confirm('Yakin mau hapus data ini yagesya?')">Delete Selected Items</button>
        <!-- ... rest of the code ... -->
    </form> --}}

    <div class="container mt-4" style="align-items: center">
        <h2 class="text-center">Home Admin</h2>
        <a href="{{ route('tambahmovie') }}" class="btn bg-info mt-2" style="margin-left: 20px">Tambah Movie</a>
    </div>
    <div class="container mt-3 mb-5">
        <div class="card mt-1"
            style="
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        padding-right: 10px;">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Foto</th>
                        <th style="max-width: 70">Genre Id</th>
                        <th>Durasi</th>
                        <th>Director</th>
                        <th>Studio</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($movie as $d)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                                {{-- <input type="checkbox" name="selected_items[]" value="{{ $d->id }}"> --}}
                            </td>
                            <td>{{ $d->name }}</td>
                            <td><img src="{{ asset($d->image) }}" style="width:300px"></td>
                            <td>{{ $d->genre_id }}</td>
                            <td>{{ $d->minutes }} Menit</td>
                            <td>{{ $d->director }}</td>
                            <td>{{ $d->studio_name }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('edit', $d->id) }}" class="btn btn-info ">Edit</a>
                                    <a href="{{ route('hapus', $d->id) }}" class="btn btn-secondary"
                                        onclick="return-confirm('Yakin mau hapus data ini yagesya?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        new DataTable('#example');

        // $(document).ready(function () {
        //     // Check All button
        //     $('#checkAllBtn').click(function () {
        //         $(':checkbox[name="selected_items[]"]').prop('checked', true);
        //     });
        //     // Uncheck All Button
        //     $('#uncheckAllBtn').click(function () {
        //         $(':checkbox[name="selected_items[]"]').prop('checked', false);
        //     });
        // });
    </script>
    <script src={{ asset('js/jquery.js') }}></script>
    <script src={{ asset('js/bootstrap.js') }}></script>
</body>

</html>
