<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => env('ADMIN_NAME'),
             'email' => env('ADMIN_EMAIL'),
             'password' => Hash::make(env('ADMIN_PASSWORD')),
             'contact' => env('ADMIN_CONTACT'),
             'nic' => env('ADMIN_NIC'),
             'role' => 'admin'
         ]);
    }
}
