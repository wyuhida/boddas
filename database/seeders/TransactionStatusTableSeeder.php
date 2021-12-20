<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Models\Transaction_Status;
class TransactionStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ins = new Transaction_Status();
        $ins->status_name = 'paid';
        $ins->update_by = 2;
        $ins->created_at = Carbon::now();
        $ins->updated_at = Carbon::now();
        $ins->save();

        $ins = new Transaction_Status();
        $ins->status_name = 'not yet paid';
        $ins->update_by = 2;
        $ins->created_at = Carbon::now();
        $ins->updated_at = Carbon::now();
        $ins->save();

        $ins = new Transaction_Status();
        $ins->status_name = 'cancelled';
        $ins->update_by = 2;
        $ins->created_at = Carbon::now();
        $ins->updated_at = Carbon::now();
        $ins->save();
    }
}
