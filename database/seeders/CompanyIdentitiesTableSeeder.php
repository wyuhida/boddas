<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Carbon\Carbon;
class CompanyIdentitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company__identities')->insert([
            'company_name' => 'boddas',
            'address_name' => 'jl.pisangan',
            'num_phone' => '086666555',
            'facebook' => 'www.fb.com',
            'instagram' => 'www.instagram.com',
            'youtube' => 'www.youtube.com',
            'email' => 'boodas@email.com',
            'update_by' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
