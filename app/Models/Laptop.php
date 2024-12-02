<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $fillable = ['merk', 'model', 'processor', 'jenis_ram', 'ukuran_ram', 'jenis_storage', 'ukuran_storage', 'gpu', 'sistem_operasi', 'harga', 'ukuran_layar', 'tipe_laptop', 'description', 'gambar'];
}
  //

