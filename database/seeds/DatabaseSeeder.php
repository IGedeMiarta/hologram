<?php

use App\User;
use Database\Seeders\DefaultSettingSeeder;
use Database\Seeders\PortofolioSeeder;
use Database\Seeders\UserSeeder;
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
         $this->call([
            DefaultSettingSeeder::class,
            // PortofolioSeeder::class,
            UserSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
