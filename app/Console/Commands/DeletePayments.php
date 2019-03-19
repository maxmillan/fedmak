<?php

namespace App\Console\Commands;

use App\Models\Paidtenant;
use Illuminate\Console\Command;

class DeletePayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DeletePayments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $payments = Paidtenant::where('id',23)->delete();
        dd($payments);
    }
}
