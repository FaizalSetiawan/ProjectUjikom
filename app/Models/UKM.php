<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UKM extends Model
{
 use HasFactory;

    protected $table = 'ukms';

    protected $fillable = ['nama_ukm','deskripsi','logo','fakultas_id'];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
