<?php

namespace Database\Seeders;

use App\Benefit;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Benefit::create([
            'about_id'=>1,
            'text'      => 'Menggunakan 100% Produk Dalam Negeri',
        ]);
        Benefit::create([
            'about_id'=>1,
            'text'      => 'Promo Menarik Setiap Bulan',
        ]);
        Benefit::create([
            'about_id'=>1,
            'text'      => 'Diskon Menarik up to 20%',
        ]);
        Benefit::create([
            'about_id'=>1,
            'text'      => 'Dikerjakan 100% oleh UMKM Lokal Bali',
        ]);
    }
}
