<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([

            'name' => 'admin',
            'FullName' => 'admin',
            'email' => 'admin@admin.com',
            'ville' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make("admin"), // password
            'remember_token' => Str::random(10),
            'admin' => 1,
        ]);
    }
}
