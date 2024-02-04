<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Log;
use App\Models\Movie;
use App\Models\Purchase;
use App\Models\PurchaseTicket;
use App\Models\User;
use Illuminate\Http\Request;

class ConfirmOrderController extends Controller
{
    public function index(Request $request)
    {
        $movie = Movie::where('id', $request->movie)->first();
        $time = $request->time_choose;
        $seats = $request->seats;
        // dd($request->all());

        $ticketPrice = 50000;
        $fee = 2000;

        $result = explode(',', $seats);
        // dd($result);
        $totalTicketPrice = $ticketPrice * count($result);
        $totalfee = $fee;
        $total = $totalTicketPrice + $totalfee;
        if ($seats != null) {
            return view('movie.confirm_order', [
                'movie' => $movie,
                'time' => $time,
                'seats' => $seats,
                'count' => count($result),
                'total' => $total,
            ]);
        } else {
            return redirect()->back()->with('error', 'mohon isi kursi/data');
        }
    }

    public function order(Request $request, User $users)
    {
        $movie_name = $request->movie_name;
        $movie_id = $request->movie_id;
        $time = $request->time;
        $total = $request->total;
        $seats = $request->seats;
        $cash = $request->cash;
        $token = $request->input('_token');
        $usercreate = $users['id'];

        // dd($request->all());

        if (!empty($movie_id) && !empty($time) && !empty($total) && !empty($cash)) {

            if ($cash < $total) {
                return redirect()->back()->withErrors(['message' => 'Uang Anda Kurang']);
            }
            $purchase = Purchase::create([
                'movie_id' => $movie_id,
                'date' => date('Y-m-d'),
                'time' => $time,
                'total' => $total,
                'cash' => $cash,
                'created_by' => $usercreate,
            ]);

            $orders = explode(',', $request->seats);

            foreach ($orders as $order) {
                PurchaseTicket::create([
                    'purchase_id' => $purchase->id,
                    'seat' => $order,
                ]);
            }

            Log::create([
                'activity' => 'melakukan transaksi',
                'user_id' => auth()->user()->id,
            ]);

            $change = $cash - $total;
            $total = number_format($total, 2, '.', ',');

            $this->saveHistory($movie_id, date('Y-m-d'), $time, $total, $seats, $usercreate, $change);

            return view('transaction.transac', [
                'movie_name' => $movie_name,
                'movie_id' => $movie_id,
                'date' => date('Y-m-d'),
                'time' => $time,
                'total' => $total,
                'cash' => $cash,
                'seats' => $seats,
                'kembalian' => $change,
                'id' => $purchase->id,
                'message' => 'pesanan berhasil dibuat!',

            ]);
        } else {
            return response()->json([
                'message' => 'parameter wajib diisi'
            ]);
        }
    }

    // Di dalam controller
    public function saveHistory($movieId, $date, $time, $total, $seats, $userId, $change)
    {
        $change = number_format($change, 2, '.', ',');

        $history = History::create([
            'movie_id' => $movieId,
            'date' => $date,
            'time' => $time,
            'total' => $total,
            'seats' => $seats,
            'change' => $change,
            'created_by' => $userId,
        ]);

        return $history;
    }
}
