<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <title>Tambah Movie</title>
    <style>
        body{
            background: grey
        }
        .card{
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <h3>Tambah Movie</h3>
            <form action="{{ route('posttambahmovie') }}" class="form-group" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Nama Film</label>
                <input type="text" name="name" class="form-control">
                <label for="">Genre</label>
                <select class="form-control" name="genre_id" id="">
                    @foreach ($genre as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <label for="">Image (Link)</label>
                <input type="file" name="image"class="form-control">
                <label for="">Minutes</label>
                <input type="text" name="minutes"class="form-control">
                <label for="">Director</label>
                <input type="text" name="director"class="form-control">
                <label for="">Studio</label>
                <input type="text" name="studio_name"class="form-control">
                <label for="">Kapasitas Studio</label>
                <input type="text" name="studio_capacity"class="form-control">
                <label for="">Sinopsis</label>
                <input type="text" name="deskripsi"class="form-control">
                <select name="status" id="">
                    <option value="ongoing" {{ $movie->status === 'ongoing' ? 'selected' : '' }}>On Going</option>
                    <option value="upcoming" {{ $movie->status === 'upcoming' ? 'selected' : '' }}>On Coming</option>
                </select>
                <div class="mt-4">
                    <button class="btn btn-success">Tambahkan Data</button>
                    <a href="{{ route('homeadmin') }}" class="btn btn-warning">Cancel (back)</a>
                </div>
            </form>
        </div>
    </div>

    <script src={{ asset('js/jquery.js') }}></script>
    <script src={{ asset('js/bootstrap.js') }}></script>
</body>
</html>
