<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Frisco Kharisma E P',
            'email' => 'frisco@mail.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Fadil Andrian',
            'email' => 'fadil@mail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
