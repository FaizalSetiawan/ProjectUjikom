<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Prestasi extends Model
{
    use HasFactory;
    protected $fillable = ['nama_prestasi', 'deskripsi', 'gambar', 'tanggal', 'ukm_id'];
}
