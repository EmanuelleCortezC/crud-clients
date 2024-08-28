<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('client_types')->insert([
            ['type' => 'Pessoa Física'],
            ['type' => 'Pessoa Jurídica'],
        ]);
    }
}
