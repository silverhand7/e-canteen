<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cashier;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cashier::updateOrCreate([
            'id' => 1,
        ], [
            'username' => 'cashier',
            'name' => 'Casher 1',
            'password' => bcrypt('password'),
        ]);

        Menu::factory(20)->create();
    }
}
