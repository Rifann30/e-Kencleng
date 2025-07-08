<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'kelompok',
        'jml_jamaah',
        'tanggal'

    ];
    

    // Relasi many-to-many ke Pengambilan
    public function pengambilan()
    {
        return $this->belongsToMany(Pengambilan::class, 'jamaah_pengambilan')
                    ->withTimestamps();
    }
}
