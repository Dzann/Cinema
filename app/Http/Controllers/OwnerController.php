<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Log;
use App\Models\Movie;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $logs = Log::all();

        return view('owner.index', compact('logs'));

    }

    public function filter(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        $start = \Carbon\Carbon::parse($start)->startOfDay();
        $end = \Carbon\Carbon::parse($end)->endOfDay();

        $logs = Log::whereBetween('created_at' ,[$start, $end])->get();
        
        return view('owner.index', compact('logs'));
    }
}
