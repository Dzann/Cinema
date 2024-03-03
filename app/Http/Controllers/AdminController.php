<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Log;
use App\Models\Movie;
use App\Models\PurchaseTicket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function homeadmin()
    {
        $movie = Movie::all();
        return view('admin.homeadmin', compact('movie'));
    }
    public function alltickets()
    {
        $ticket = PurchaseTicket::all();
        return view('admin.homeadmin', compact('ticket'));
    }
    public function tambahmovie(Movie $movie)
    {
        $genre = Genre::all();
        return view('admin.tambahmovie', compact('genre', 'movie'));
    }
    public function posttambahmovie(Request $request)
    {
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
            'name' => $request->name,
            'genre_id' => $request->genre_id,
            'image' => $request->image->store('img'),
            'minutes' => $request->minutes,
            'director' => $request->director,
            'studio_name' => $request->studio_name,
            'studio_capacity' => $request->studio_capacity,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);
        return redirect()->route('homeadmin')->with('message', 'berhasil menambah Movie');
    }

    public function edit(Movie $movie)
    {
        $genre = Genre::all();
        return view('admin.editMovie', compact('genre', 'movie'));
    }

    public function editMovie(Movie $movie, Request $request)
    {
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


        return redirect()->route('homeadmin')->with('message', 'Movie Berhasil di edit');
    }

    function trash()
    {
        $movie = Movie::all();
        return view('admin.trashAdmin', compact('movie'));
    }

    function hapus(movie $movie)
    {
        $movie->update([
            'status' => 'upcoming',
        ]);
        return redirect()->route('homeadmin')->with('message', 'Berhasil Hapus');
    }
    public function masuk(Movie $movie)
    {
        $movie->update([
            'status' => 'ongoing',
        ]);
        return redirect()->route('trash')->with('message', 'Berhasil Memasukan');
    }

    public function formUser()
    {
        $user = User::where('role', '!=', 'admin')->get();
        // $user = User::all();

        return view('admin.adminUser', ['user' => $user]);
    }
    public function formTambahUser()
    {
        $user = User::where('role', '!=', 'admin')->get();

        return view('admin.tambahUser', ['user' => $user]);
    }

    public function tambahUser(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
            "role" => "required",
        ]);
        if (User::where('username', $request->username)->exists()) {
            return redirect()->back()->with('message', 'Username tidak tersedia');
        } else {
            User::create([
                "username" => $request->username,
                "password" => bcrypt($request->password),
                "role" => $request->role,
            ]);

            return redirect()->route('formUser')->with('message', 'Berhasil Tambah User');
        }
    }

    public function formEditUser(User $user)
    {
        return view('admin.editUser', compact('user'));
    }

    public function editUser(User $user, Request $request)
    {
        $data =  $request->validate([
            "username" => "required",
            "password" => "required",
            "role" => "required",
        ]);

        $data['password'] = bcrypt($request->password);
        
        $user->update($data);

        return redirect()->route('formUser')->with('message', 'user Berhasil di edit');
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->route('formUser')->with('message', 'user Berhasil di hapus');
    }
}
