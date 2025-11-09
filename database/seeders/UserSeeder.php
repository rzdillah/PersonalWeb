<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Rizky Fikry',
            'email' => 'rizkyfikryfadillah@gmail.com',
            'password' => Hash::make('rizkyfikryfadillah'), 
            'email_verified_at' => now(),
        ]);

        \Log::info('Admin users seeded successfully');
    }
}
