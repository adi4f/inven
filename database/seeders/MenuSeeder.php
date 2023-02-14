<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("menus")->insert([
            'name' => 'DASHBOARD',
            'url' => '',
            'name' => 'PT Royal Abadi Sejahtera',
            'address' => 'Jl. Cimareme No. 275',
            'province' => 'Jawa Barat',
            'city' => 'Bandung Barat',
            'postal_code' => '43000',
            'web' => 'ras.co.id',
            'email' => 'admin@ras.co.id',
            'telephone' => '022-12345678',
            'fax' => '022-12345678',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            
        ]);
    }
}
