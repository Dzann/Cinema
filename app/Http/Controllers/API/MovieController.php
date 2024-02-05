<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function welcome()
    {
        $movies = Movie::with('genre')->get();
        return view('welcome', ['movie' => $movies]);
    }
    public function showMovies(Request $request)
    {
        $movies = Movie::with('genre')->get();
        return view('movie.index', ['movie' => $movies]);
    }

    public function detailmovie(Movie $movie, Request $request)
    {
        $movie_name = $request->movie->name;
        $movie_image = $request->movie->image;
        $movie_id = $request->movie_id;
        // $movie = Movie::all();


        return view('movie.detail', [
            'movie_name' => $movie_name,
            'movie_id' => $movie_id,
            'movie_image' => $movie_image,
        ], compact('movie'));
    }
}
