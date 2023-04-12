<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loans')->insert([
            'amount' => 10000000,
            'outstanding_balance' => 3000000,
            'customer_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()->subMinutes(2)->diffForHumans()
        ]);
    
    }
}
