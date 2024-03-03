<?php

namespace App\Console\Commands;

use App\Models\PurchaseTicket;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ResetSeats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seats:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset sold seats at midnight';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        PurchaseTicket::where('created_at', '<', Carbon::now()->subDay())->delete();
        
        $this->info('Kursi berhasil diatur ulang.');
        
    }
}
