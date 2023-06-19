<?php

namespace App\Console\Commands;

use App\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class ExpiredOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired orders';

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
        //Auto delete paymongo orders that are not paid after an hour  
        Order::where('country', '!=', 'Cash on Delivery')
                ->where('status', '=', 'Pending')
                ->where('created_at', '>=', Carbon::now()->subMinutes(60)->toDateTimeString())
                ->delete();  

                $this->info('Deleted expired orders');
    }
}
