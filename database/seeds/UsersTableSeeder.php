<?php

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
            'name' => 'Admin',
            'nohp' => '0852',
            'email' => 'admin@email.com',
            'role' => '1',
            'instansi' => 'BPBD',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'nohp' => '0852',
            'email' => 'user@email.com',
            'role' => '2',
            'instansi' => 'BPBD',
            'email_verified_at' => now(),
            'password' => Hash::make('user'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
