<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'        => 'Admin',
            'last_name'         => 'Admin',
            'email'             => 'admin@mail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin@mail.com'),
            'is_admin'              => true,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
