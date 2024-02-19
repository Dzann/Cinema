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
use illuminate\Support\Str;

class TransactionHistoryController extends Controller
{

    public function showPurchases()
    {
        $histories = History::with('movie')->get();

        $groupedHistories = $histories->groupBy(function ($history) {
            return \Carbon\Carbon::parse($history->created_at)->format('d-m-Y');
        })->map(function ($dailyHistories) {
            return [
                'date' => $dailyHistories->first()->created_at, // Use any date from the group
                'total' => $dailyHistories->sum('total'),
            ];
        });

        $date = $groupedHistories->pluck('date')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d-m-Y');
        })->toArray();

        $profit = $groupedHistories->pluck('total')->toArray();

        $totalProfit = array_sum($profit);

        // dd($histories);
        $chart = (new LarapexChart)->setType('area')
            ->setTitle('History')
            ->setSubtitle('History Transaction')
            ->setXAxis($date)
            ->setDataset([
                [
                    'name' => 'Income',
                    'data' => $profit
                ]
            ]);

        // return view('transaction.history', compact('chart'));
        return view('transaction.history', ['histories' => $histories, 'chart' => $chart, 'total' => $totalProfit]);
    }

    public function filterPdf(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        $start = \Carbon\Carbon::parse($start)->startOfDay();
        $end = \Carbon\Carbon::parse($end)->endOfDay();

        $histories = History::with('movie')->get();
        
        $histories = History::whereBetween('created_at', [$start, $end])->get();
        $profit = $histories->pluck('total')->toArray();

        $totalProfit = array_sum($profit);

        $pdf = PDF::loadView('template.histories', compact('histories', 'totalProfit'));
        return $pdf->download('History Transaksi.pdf');
    }

    public function filteredChart(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        $start = \Carbon\Carbon::parse($start)->startOfDay();
        $end = \Carbon\Carbon::parse($end)->endOfDay();

        $histories = History::with('movie')->get();

        
        $histories = History::whereBetween('created_at', [$start, $end])->get();
        $groupedHistories = $histories->groupBy(function ($history) {
            return \Carbon\Carbon::parse($history->created_at)->format('d-m-Y');
        })->map(function ($dailyHistories) {
            return [
                'date' => $dailyHistories->first()->created_at, // Use any date from the group
                'total' => $dailyHistories->sum('total'),
            ];
        });
        $date = $groupedHistories->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        })->toArray();

        $profit = $groupedHistories->pluck('total')->toArray();

        $totalProfit = array_sum($profit);

        $chart = (new LarapexChart)->setType('area')
            ->setTitle('History')
            ->setSubtitle('History Transaction')
            ->setXAxis($date)
            ->setDataset([
                [
                    'name' => 'Income',
                    'data' => $profit
                ]
            ]);

        return view('transaction.history', ['histories' => $histories, 'chart' => $chart, 'total' => $totalProfit])->with('message', 'Filter Successfully');
    }
    
    public function ticket(Request $request)
    {
        $seats = explode(',', $request->seats);
        $purchase = Purchase::where(['movie_id' => $request->id_movie, 'time' => $request->time])->with(['ticket', 'movie'])->latest()->first();

        $tickets = [];

        foreach ($seats as $seat) {
            $ticket = PurchaseTicket::where('purchase_id', $purchase->id)->where('seat', $seat)->first();
            if ($ticket) {
                $tickets[] = $ticket;
            }
        }
        if (!empty($tickets)) {
            $pdf = PDF::loadView('template.ticket', compact('tickets', 'purchase'));
            return $pdf->download($purchase->movie->name.'.pdf'); 
            // # code...
        } else {
            return back()->with('message', 'Ticket tidak tersedia');
        }
    }

}
