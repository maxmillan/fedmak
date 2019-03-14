<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'TransactionType' => str_random(10),
            'TransactionId' => str_random(10),
            'TransAmount' => str_random(10),
            'BusinessShortCode' => str_random(10),
            'BillRefNumber' => str_random(10),
            'OrgAccountBalance' => bcrypt('secret'),
            'MSISDN' => bcrypt('secret'),
            'FirstName' => bcrypt('secret'),
            'MiddleName' => bcrypt('secret'),
            'LastName' => bcrypt('secret'),
            'PaymentMode' => bcrypt('secret'),
        ]);
    }
}
