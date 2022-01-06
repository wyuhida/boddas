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
            'discount_percentage' => 0.0,
            'target_penjualan' => 1,
            'stock_limit' => 1,
            'update_by' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('buyers')->insert([
            'id' => 2,
            'buyer' => 'reseler',
            'discount_percentage' => 0.0,
            'target_penjualan' => 1,
            'stock_limit' => 1,
            'update_by' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('buyers')->insert([
            'id' => 3,
            'buyer' => 'distributor',
            'discount_percentage' => 0.0,
            'target_penjualan' => 1,
            'stock_limit' => 1,
            'update_by' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // DB::table('buyers')
        //     ->where('id', 1)
        //     ->update([
        //         'discount_percentage' => 0.1,
        //         'stock_limit' => 3,
        //     ]);

        // DB::table('buyers')
        //     ->where('id', 2)
        //     ->update([
        //         'discount_percentage' => 0.2,
        //         'stock_limit' => 5,
        //     ]);

        // DB::table('buyers')
        //     ->where('id', 3)
        //     ->update([
        //         'discount_percentage' => 0.3,
        //         'stock_limit' => 10,
        //     ]);
    }
}
