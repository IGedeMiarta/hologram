<?php

namespace Database\Seeders;

use App\DefaultSettings;
use Illuminate\Database\Seeder;

class DefaultSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DefaultSettings::create([
            'Name' =>  'Hologram',
            'Logo' => null,
            'phone'=> '09989991211',
            'mail' => 'info@hologram.co.id',
            's_fb' => null,
            's_ig' => null,
            's_pin' => null,
            's_tt' => null
        ]);
    }
}
