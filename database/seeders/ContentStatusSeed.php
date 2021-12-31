<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use DB;
class ContentStatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content__statuses')->insert([
            'id' => 1,
            'status_name' => 'aktif',
            'id_user' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('content__statuses')->insert([
            'id' => 2,
            'status_name' => 'tidak-aktif',
            'id_user' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
