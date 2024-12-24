<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Laptop;

class LaptopSeeder extends Seeder
{
    public function run()
    {
        Laptop::create([
            'merk' => 'Huawei',
            'model' => 'TUF Dash A15',
            'sistem_operasi' => 'Windows 11',
            'processor' => 'Intel I7 12900H',
            'jenis_ram' => 'DDR4',
            'ukuran_ram' => '16GB',
            'jenis_storage' => 'SSD',
            'ukuran_storage' => '512GB',
            'gpu' => 'RTX 3060',
            'harga' => 20650000,
            'ukuran_layar' => '13.3"',
            'tipe_laptop' => 'Gaming',
            'gambar' => 'DldMcO3xi2jJlw1n07KtyFMNDS6UVwsWlLsk04q9.png',
        ]);



    }
}
