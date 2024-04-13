<?php

namespace Database\Seeders;

use App\CostType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CostType::create([
            'name' => 'Produksi',
            'mark'  => Str::slug('Produksi')
        ]);
        CostType::create([
            'name' => 'Gaji',
            'mark'  => Str::slug('Gaji')
        ]);
        CostType::create([
            'name' => 'Pengeluaran Rutin Bulanan',
            'mark'  => Str::slug('Pengeluaran Rutin Bulanan')
        ]);
        CostType::create([
            'name' => 'Lain-lain',
            'mark'  => Str::slug('Lain-lain')
        ]);
       
    }
}
