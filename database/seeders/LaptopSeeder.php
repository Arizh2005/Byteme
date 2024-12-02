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
            'merk' => 'Dell',
            'model' => 'XPS 13',
            'sistem_operasi' => 'Windows 11',
            'processor' => 'Intel i7',
            'jenis_ram' => 'DDR4',
            'ukuran_ram' => '16GB',
            'jenis_storage' => 'SSD',
            'ukuran_storage' => '512GB',
            'gpu' => 'Intel Iris Xe',
            'harga' => 20000000,
            'ukuran_layar' => '13.3"',
            'tipe_laptop' => 'Ultrabook',
            'gambar' => 'DldMcO3xi2jJlw1n07KtyFMNDS6UVwsWlLsk04q9.png',
        ]);



    }
}
