<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('merk')->nullable();
            $table->string('model')->nullable();
            $table->string('processor')->nullable();
            $table->enum('sistem_operasi', ['Windows 10', 'Windows 11', 'iOS'])->nullable();
            $table->enum('jenis_ram', ['DDR3', 'DDR4', 'DDR5'])->nullable();
            $table->enum('ukuran_ram', ['4GB', '8GB', '12GB', '16GB'])->nullable(); // GB
            $table->enum('jenis_storage', ['SSD', 'HDD'])->nullable();
            $table->enum('ukuran_storage', ['256GB', '512GB', '1TB'])->nullable(); // GB
            $table->string('gpu')->nullable();
            $table->decimal('harga', 15, 2)->nullable(); // Harga dengan dua desimal
            $table->string('ukuran_layar')->nullable(); // Contoh: 15.6"
            $table->string('tipe_laptop')->nullable();
            $table->string('gambar')->nulleable();
            $table->text('description')->nullable();
            $table->timestamps(); // Ini akan menambahkan kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}
