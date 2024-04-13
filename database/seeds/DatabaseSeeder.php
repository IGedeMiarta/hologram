<?php

use App\Benefit;
use App\CostType;
use App\User;
use Database\Seeders\AboutSeeder;
use Database\Seeders\BenefitSeeder;
use Database\Seeders\CostTypeSeeder;
use Database\Seeders\DefaultSettingSeeder;
use Database\Seeders\PortofolioSeeder;
use Database\Seeders\ProductTypeSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\TestiSeeder;
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
            UserSeeder::class,
            AboutSeeder::class,
            BenefitSeeder::class,
            ServiceSeeder::class,
            TestiSeeder::class,
            CostTypeSeeder::class,
            ProductTypeSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
