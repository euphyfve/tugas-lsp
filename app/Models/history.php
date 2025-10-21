<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;

    public function listBandara()
    {
        return $this->belongsTo(bandara::class, 'id_bandara', 'id');
    }

    protected $fillable = [
        'invoice',
        'id_bandara',
        'nama_user',
        'seat',
        'class',
        'keberangkatan',
        'tujuan_akhir',
        'total',
        'conf',
    ];
}
