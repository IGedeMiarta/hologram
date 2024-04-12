<?php

namespace Database\Seeders;

use App\Testimoni;
use Illuminate\Database\Seeder;

class TestiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimoni::create([
            'about_id' => 1,
            'testi_img' => 'frontend/img/about-img-3.jpg',
            'testi_name' => 'Komang Agus',
            'testi_title'   => 'Agent BPD',
            'testimoni' => 'Bajunya Memang Ga Kalah Saing, Cocok Pokoknya. Mau satuan atau buat banyak'   
        ]);
        Testimoni::create([
            'about_id' => 1,
            'testi_img' => 'frontend/img/about-img-3.jpg',
            'testi_name' => 'Putu Wira Adi',
            'testi_title'   => 'Pelajar',
            'testimoni' => 'Buat Baju Kelas Disini teman taman-semua suka, harganya murah termasuk diskon pelajar.'   
        ]);
        Testimoni::create([
            'about_id' => 1,
            'testi_img' => 'frontend/img/about-img-3.jpg',
            'testi_name' => 'Nyoman Antara',
            'testi_title'   => null,
            'testimoni' => 'Beli Baju Satuan tetap dilayani dengan baik, harga yang murah walaupun request saya macem-macem. Sekadi Mantap'   
        ]);
        Testimoni::create([
            'about_id' => 1,
            'testi_img' => 'frontend/img/about-img-3.jpg',
            'testi_name' => 'Ngurah Arya',
            'testi_title'   => 'Pegawai Swasta',
            'testimoni' => 'Udah Biasa Order Disini jadi no comment. Pokoknya recomended, top!'   
        ]);
    }
}
