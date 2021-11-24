<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Hash;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // DB::table('users')->truncate();
        // $super_admin_role = Role::where('id', 1)->first();
        // $admin_role = Role::where('id', 2)->first();

        // $super_admin = User::create([
        //     'fullname' => 'Super Admin',
        //     'username' => 'Super-Admin',
        //     'email' => 'superadmin@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'phone_number' => '088888811',
        //     'is_active' => true,
        // ]);

        // $admin = User::create([
        //     'fullname' => 'Admin',
        //     'username' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'phone_number' => '088888812',
        //     'is_active' => true,
        // ]);

        // $super_admin->roles()->attach($super_admin_role);
        // $admin->roles()->attach($admin_role);

        DB::table('users')->insert([
            'id' => 1,
            'id_role' => '1',
            'fullname' => 'Super Admin',
            'username' => 'Super-Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_number' => '088888811',
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'id_role' => '2',
            'fullname' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_number' => '088888812',
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'id_role' => '3',
            'fullname' => 'customer',
            'username' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_number' => '088888813',
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'id_role' => '3',
            'fullname' => 'reseler',
            'username' => 'Reseler',
            'email' => 'reseler@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_number' => '088888814',
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'id' => 5,
            'id_role' => '3',
            'fullname' => 'afiliate',
            'username' => 'Afiliate',
            'email' => 'afiliate@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_number' => '088888815',
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
