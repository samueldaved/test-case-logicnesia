<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'username' => 'UserSpv',
            'email' => 'spv@gmail.com',
            'role' =>'Supervisor',
            'password' => bcrypt('Spv12345')
         ]);

        \App\Models\User::create([
            'username' => 'UserAdmin',
            'email' => 'admin@gmail.com',
            'role' =>'Admin',
            'password' => bcrypt('Admin12345')
        ]);

        \App\Models\User::create([
            'username' => 'Vendor',
            'email' => 'vendor@gmail.com',
            'role' =>'Vendor',
            'password' => bcrypt('Vendor12345')
        ]);


    }
}
