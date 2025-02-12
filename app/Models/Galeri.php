<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
     
    protected $fillable = ['fakultas_id','judul','gambar','deskripsi'];

    public function fakkultas(){
        return $this->belongsTo(Fakultas::class);
    }
}
