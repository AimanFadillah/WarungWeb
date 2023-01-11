<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        Barang::factory(20)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'man@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}
