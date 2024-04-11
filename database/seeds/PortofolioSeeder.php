<?php

namespace Database\Seeders;

use App\Portofolio;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use UnsplashImageProvider;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){
 
            // insert data ke table pegawai menggunakan Faker
            Portofolio::create([
                'name' => $faker->company,
                'by_logo' => $faker->imageUrl(100, 100, 'business'),
                'by_name' => $faker->company,
                'header_img' => $faker->imageUrl(800, 400, 'business'),
                'complte'   => $faker->date,
            ]);
 
        }
    }
}
