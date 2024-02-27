@extends('layout.app')

@section('title', 'edit')

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">
@section('body')

@include('layout.navigationbar')
    <div class="container mt-5">
        <div class="card">
            <h3 class="text-center mt-2">Tambah Movie</h3>
            <div class="card-body">
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
                    <label for="">Image</label>
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
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="ongoing" {{ $movie->status === 'ongoing' ? 'selected' : '' }}>On Going</option>
                        <option value="upcoming" {{ $movie->status === 'upcoming' ? 'selected' : '' }}>On Coming</option>
                    </select>
                    <div class="mt-4">
                        <button class="btn btn-info">Tambahkan Data</button>
                        <a href="{{ route('homeadmin') }}" class="btn btn-secondary">Cancel (back)</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src={{ asset('js/jquery.js') }}></script>
    <script src={{ asset('js/bootstrap.js') }}></script>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>

@endsection
