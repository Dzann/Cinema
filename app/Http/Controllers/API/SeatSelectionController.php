<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Purchase;
use App\Models\PurchaseTicket;
use App\Models\User;
use Illuminate\Http\Request;

class SeatSelectionController extends Controller
{
    public function index(Request $request)
    {
        $movie_id = $request->movie_id;
        $movie_name = $request->movie_name;
        $time = $request->time;

        if (!empty($movie_id) && !empty($time)) {
            $purchase = Purchase::where([
                ['movie_id', $movie_id],
                ['time', $time]
            ])->with(['ticket'])->get();

            $movie = Movie::where('id', $movie_id)->get();

            if ($purchase != null) {
                $tickets = [];
                foreach ($purchase as $value) {
                    $ticket = PurchaseTicket::where('purchase_id', $value->id)->get();
                    $tickets[] = $ticket;
                }

                $seats_sold = [];
                foreach ($tickets as $ticket) {
                    foreach ($ticket as $v) {
                        $seats_sold[] = $v->seat;
                    }
                }

                return view('movie.seat_selection', [
                    'date' => date('d F'),
                    'movie' => $movie,
                    'movie_name' => $movie_name,
                    'time_choose' => $request->time,
                    'purchase' => $purchase,
                    'seats_sold' => $seats_sold,
                    'sold_total' => count($seats_sold),
                ]);
            } else {
                return view('movie.seat_selection', [
                    'date' => date('d F'),
                    'movie_name' => $movie_name,
                    'movie' => $movie,
                    'time_choose' => $request->time,
                    'purchase' => $purchase,
                    'seats_sold' => [],
                    'sold_total' => 0,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Parameter wajib di isi');
        }
    }
}
