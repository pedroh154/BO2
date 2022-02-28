<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class TransportadorasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        
        DB::table('transportadoras')->insert([
        [
            'cnpj' => '06367990000268',
            'nome' => 'TEX',
            "created_at" => $now,
            "updated_at" => $now,
        ],
        [
            'cnpj' => '06897194006944',
            'nome' => 'União',
            "created_at" => $now,
            "updated_at" => $now,
        ],
        ]);
    }
}
