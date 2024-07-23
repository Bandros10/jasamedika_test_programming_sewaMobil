<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);
        // client::create([
        //     'telepon' => fake()->phoneNumber,
        //     'no_SIM' => fake()->numberBetween(0000000000,9999999999),
        //     'alamat' => fake()->address,
        //     'user_id' => $user->id
        // ]);
        // for ($i=0; $i <= 5 ; $i++) {
        //     $user = User::create([
        //         'name' => fake()->name,
        //         'email' => fake()->unique()->email,
        //         'email_verified_at' => now(),
        //         'password' => Hash::make('password'),
        //         'remember_token' => Str::random(10),
        //     ]);

        //     client::create([
        //         'telepon' => fake()->phoneNumber,
        //         'no_SIM' => fake()->numberBetween(0000000000,9999999999),
        //         'alamat' => fake()->address,
        //         'user_id' => $user->id
        //     ]);
        // }
    }
}
