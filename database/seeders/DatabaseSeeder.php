<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@filamentphp.com',
        ]);
        \App\Models\User::factory()->create();

        \App\Models\User::All()->each(function ($user) {
            $user->things()->saveMany(\App\Models\Thing::factory(3)->make());
        });
    }
}
