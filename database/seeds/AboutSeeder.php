<?php

namespace Database\Seeders;

use App\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'banner_img' =>'frontend/img/about-img-1.jpg',
            'title' => 'Kami Percaya Kualitas Indonesia',
            'desc'  => 'Kami adalah tim yang membanggakan kerjasama dengan konveksi di Bali, sebuah pulau yang dipenuhi dengan inspirasi seni dan kerajinan lokal. Kami menggabungkan keahlian kami dalam desain dengan kecakapan para pengrajin lokal untuk menghasilkan produk pakaian berkualitas tinggi. Setiap kaos, kemeja, atau pakaian lain yang kami ciptakan tidak hanya mencerminkan keindahan dan keunikan desain Indonesia, tetapi juga menggambarkan komitmen kami untuk mendukung pertumbuhan UMKM lokal. Melalui kolaborasi kami dengan para pengrajin dan produsen lokal, kami tidak hanya menciptakan produk yang berkualitas, tetapi juga memberikan dampak positif bagi komunitas setempat. Kami percaya bahwa keindahan dan kualitas produk Indonesia harus dirayakan dan dipertahankan dalam setiap langkah proses produksi. Kami memilih bahan-bahan berkualitas tinggi dan mendukung praktik-praktik produksi yang ramah lingkungan. Dengan cara ini, kami tidak hanya menciptakan pakaian yang berkualitas dan bermakna, tetapi juga menjaga warisan budaya Indonesia tetap hidup.',
            'banefit_img'   => 'frontend/img/about-img-2.jpg',
            'service_title' => 'Hal Terbaik Yang Kami Tawarkan',
            'service_sub_title' => 'Hal Terbaik Yang Dapat Kami Tawarkan Untuk Berkolaborasi Mendukung UMKM Lokal untuk Masa Depan Perekonomian Indonesia Menjadi Lebih Baik',
            'testi_title'   => 'Apa Pendapat Customer?',
            'testi_sub_title' => 'Kami mendengarkan pendapat customer tantang, agar dapat memberikan kualitas produk yang terbaik.',
            'quote' => "I'm selfish, impatient and a little insecure. I make mistakes, I am out of control and at times hard to handle. But if you can't handle me at my worst, then you sure as hell don't deserve me at my best",
            'quote_by_name' => 'MELANI MONREO',
            'quote_by_title'=> 'designer, REDstone Company',
            'quote_by_img'=>'frontend/img/about-img-7.jpg'
        ]);
    }
}
