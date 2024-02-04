@extends('layout.app')

@section('title', 'edit')

@section('body')

    @include('layout.navigationbar')

    <div class="container mt-5">
        <div class="card">
            <h3>Edit Movie</h3>
            <form action="{{ route('editMovie', $movie->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Nama Film</label>
                <input type="text" name="name" class="form-control" value="{{ $movie->name }}">
                <label for="">Genre</label>
                <select class="form-control" name="genre_id" id="">
                    @foreach ($genre as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <label for="">Image (Link)</label>
                <input type="file" name="image"class="form-control">
                <label for="">Minutes</label>
                <input type="text" name="minutes"class="form-control" value="{{ $movie->minutes }}">
                <label for="">Director</label>
                <input type="text" name="director"class="form-control" value="{{ $movie->director }}">
                <label for="">Studio</label>
                <input type="text" name="studio_name"class="form-control" value="{{ $movie->studio_name }}">
                <label for="">Kapasitas Studio</label>
                <input type="text" name="studio_capacity"class="form-control" value="{{ $movie->studio_capacity }}">
                <label for="">Sinopsis</label>
                <input type="text" name="deskripsi"class="form-control" value="{{ $movie->deskripsi }}">
                <div class="mt-4">
                    <button class="btn btn-success">Edit Data</button>
                    <a href="{{ route('homeadmin') }}" class="btn btn-warning">Cancel (back)</a>
                </div>
            </form>
        </div>
    </div>

@endsection
