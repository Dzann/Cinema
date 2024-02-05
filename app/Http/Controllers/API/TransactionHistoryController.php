<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Movie;
use App\Models\Purchase;
use App\Models\PurchaseTicket;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class TransactionHistoryController extends Controller
{

    public function showPurchases()
    {
        $histories = History::with('movie')->get();

        $tanggal = $histories->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d-m-Y');
        })->toArray();

        $profit = $histories->pluck('total')->toArray();

        $totalProfit = array_sum($profit);

        $chart = (new LarapexChart)->setType('area')
            ->setTitle('History')
            ->setSubtitle('From transaction on this day')
            ->setXAxis($tanggal)
            ->setDataset([
                [
                    'name' => 'Income',
                    'data' => $profit
                ]
            ]);

        // return view('transaction.history', compact('chart'));
        return view('transaction.history', ['histories' => $histories, 'chart' => $chart, 'total' => $totalProfit]);
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

    public function filteredChart(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        $start = \Carbon\Carbon::parse($start)->startOfDay();
        $end = \Carbon\Carbon::parse($end)->endOfDay();

        $histories = History::with('movie')->get();
        
        $histories = History::whereBetween('created_at', [$start, $end])->get();
        $date = $histories->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        })->toArray();

        $profit = $histories->pluck('total')->toArray();

        $totalProfit = array_sum($profit);

        $chart = (new LarapexChart)->setType('area')
            ->setTitle('History')
            ->setSubtitle('From transaction on this day')
            ->setXAxis($date)
            ->setDataset([
                [
                    'name' => 'Income',
                    'data' => $profit
                ]
            ]);

        return view('transaction.history', ['histories' => $histories, 'chart' => $chart, 'total' => $totalProfit]);
    }
}
