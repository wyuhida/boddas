<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use DB;
class BuyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buyers')->insert([
            'id' => 1,
            'buyer' => 'customer',
            'discount_percentage' => 0.1,
            'update_by' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('buyers')->insert([
            'id' => 2,
            'buyer' => 'reseler',
            'discount_percentage' => 0.1,
            'update_by' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('buyers')->insert([
            'id' => 3,
            'buyer' => 'afiliate',
            'discount_percentage' => 0.1,
            'update_by' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
