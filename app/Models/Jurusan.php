<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = ['fakultas_id','nama_jurusan','deskripsi'];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
