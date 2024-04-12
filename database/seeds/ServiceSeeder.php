<?php

namespace Database\Seeders;

use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'about_id'  => 1,
            'image'     => 'frontend/img/service-img-1.png',
            'title'     => 'FREE DESIGN',
            'desc'      => 'Bebas Desain Suka-Suka, Free untuk kamu yang masih bingung dengan desain yang diinginkan'
        ]);
        Service::create([
            'about_id'  => 1,
            'image'     => 'frontend/img/service-img-2.png',
            'title'     => 'PREMIUM QUALITY',
            'desc'      => 'Bahan Premium 100% Produk Dalam Negeri, Kamu bisa memilah milih bahan yang mamu inginkan. budget cocok, deal!'
        ]);
        Service::create([
            'about_id'  => 1,
            'image'     => 'frontend/img/service-img-3.png',
            'title'     => 'HARGA BERSAING',
            'desc'      => 'Jangan Khawatir Tentang Harga, Kami bekerja sama dengan UMKM Konveksi di Bali untuk mewujudkan produk terbaik dangan harga yang seminim mungkin.'
        ]);
         Service::create([
            'about_id'  => 1,
            'image'     => 'frontend/img/service-img-4.png',
            'title'     => 'AFTER SALE SERVICE',
            'desc'      => 'Pesanan Tidak Sesuai?, Salah Ukuran?, Produk Reject?, Tenang Kami bisa retur produk yang kamu terima dengan produk baru yang sesuai dengan pesanan kamu.'
        ]);
    }
}
