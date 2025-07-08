<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jml_dana',
        'jml_jamaah',
        'jml_pengambilan',
        'tanggal',
        'periode',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    // Relasi many-to-many ke Jamaah
    public function jamaah()
    {
        return $this->belongsToMany(Jamaah::class, 'jamaah_pengambilan', 'pengambilan_id', 'jamaah_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
