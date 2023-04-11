<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Sys Admin',
            'email' => 'sysadmin@dfcu.co.ug',
            'password' => '$2y$10$jrxiiKpZHMPtqkPNVn2cruZCcpdFiN0gWx4iSL/19iUm92oD2pGta',
        ]);
    }
}
