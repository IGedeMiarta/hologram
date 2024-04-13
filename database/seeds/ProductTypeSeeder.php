<?php

namespace Database\Seeders;

use App\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::create([
            'name' => 'Kaos Polos',
            'mark'  => Str::slug('Kaos Polos')
        ]);
        ProductType::create([
            'name' => 'Kemeja',
            'mark'  => Str::slug('Kemeja')
        ]);
        ProductType::create([
            'name' => 'Polo',
            'mark'  => Str::slug('Polo')
        ]);
        ProductType::create([
            'name' => 'Long Sleeve',
            'mark'  => Str::slug('Long Sleeve')
        ]);
    }
}
