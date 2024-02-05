<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Movie;
use App\Models\Purchase;
use App\Models\PurchaseTicket;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionHistoryController extends Controller
{

    public function showPurchases()
    {
        $histories = History::with('movie')->get();

        return view('transaction.history', ['histories' => $histories]);
    }

    public function ticket(Request $request)
    {
        $seat = explode(',', $request->seats);
        $purchase = Purchase::where(['movie_id' => $request->id_movie, 'time' => $request->time])->with(['ticket', 'movie'])->first();
        $ticket = PurchaseTicket::where('purchase_id', $purchase->id)->whereIn('seat', $seat)->get();
        
        foreach ($ticket as $tick) {
            $invoice = [
                'ticket' => $tick,
                'purchase' => $purchase,
                'seat' => $request->seats
            ];
        
            $pdf = PDF::loadView('template.ticket', $invoice);
            return $pdf->download('Ticket' . $tick->id . '.pdf');
        }
    }
}
