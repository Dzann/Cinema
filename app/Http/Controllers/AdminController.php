<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\PurchaseTicket;
use Illuminate\Http\Request;

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
        return redirect()->route('homeadmin')->with('notif','Berhasil Tambah Movie');

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
        
        return redirect()->route('homeadmin')->with('notif','Movie Berhasil di edit');
    }

    function hapus(movie $movie) {
        $movie->delete();
        return redirect()->route('homeadmin')->with('notif', 'Berhasil Edit Movie');
    }
    public function deleteterpilih(Request $request)
    {
        $selectedItems = $request->input('selected_items', []);

        // Ensure at least one item is selected
        if (empty($selectedItems)) {
            return redirect()->back()->with('error', 'Please select at least one movie to delete.');
        }

        // Delete selected movies
        Movie::whereIn('id', $selectedItems)->delete();

        return redirect()->back()->with('success', 'Selected movies have been deleted successfully.');
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
        return redirect()->route('homeadmin')->with('notif','Berhasil Tambah User');

    }
}
