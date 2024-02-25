<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Log;
use App\Models\Movie;
use App\Models\PurchaseTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function homeadmin()  {
        $movie = Movie::all();
        return view('admin.homeadmin',compact('movie'));
    }
    public function alltickets()  {
        $ticket = PurchaseTicket::all();
        return view('admin.homeadmin',compact('ticket'));
    }
    public function tambahmovie(Movie $movie)  
    {
        $genre = Genre::all();
        return view('admin.tambahmovie', compact('genre', 'movie'));
    }
    public function posttambahmovie(Request $request)  {
        $request->validate([
            "name" => "required",
            "genre_id" => "required",
            "image" => "required",
            "minutes" => "required",
            "director" => "required",
            "studio_name" => "required",
            "studio_capacity" => "required",
            "deskripsi" => "required",
            "status" => "required",
        ]);
        Movie::create([
            'name'=> $request->name,
            'genre_id'=> $request->genre_id,
            'image'=> $request->image->store('img'),
            'minutes'=>$request->minutes,
            'director'=>$request->director,
            'studio_name'=>$request->studio_name,
            'studio_capacity'=>$request->studio_capacity,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);
        return redirect()->route('homeadmin')->with('message','berhasil menambah Movie');

    }

    public function edit(Movie $movie)
    {
        $genre = Genre::all();
        return view('admin.editMovie', compact('genre', 'movie'));
    }

    public function editMovie(Movie $movie, Request $request)  {
        $data =  $request->validate([
            "name" => "required",
            "genre_id" => "required",
            "image" => "",
            "minutes" => "required",
            "director" => "required",
            "studio_name" => "required",
            "studio_capacity" => "required",
            "deskripsi" => "required",
            'status' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('img');
        } else {
            unset($data['image']);
        }
        $movie->update($data);
        

        return redirect()->route('homeadmin')->with('message','Movie Berhasil di edit');
    }

    function hapus(movie $movie) {
        $movie->delete();
        $user = Auth::user();

        return redirect()->route('homeadmin')->with('message', 'Berhasil Hapus');
    }
    
    public function tambahuser(Request $request)  {
        $request->validate([
            "username" => "required",
            "password" => "required",
            "role" => "required",
        ]);
        Movie::create([
            "username" => $request->username,
            "password" => $request->password,
            "role" => $request->role,
        ]);
        return redirect()->route('homeadmin')->with('message','Berhasil Tambah User');

    }
}
