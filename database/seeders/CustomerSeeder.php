<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'first_name' => 'First',
            'last_name' => 'Customer',
            'account_number' => 'DF56748291',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()->subMinutes(2)->diffForHumans()
        ]);
    }
}
