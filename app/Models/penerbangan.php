<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\bandara;

class penerbangan extends Model
{
    use HasFactory;

    public function listBandara()
    {
        return $this->belongsTo(bandara::class, 'id_bandara', 'id');
    }

    protected $fillable = [
        'nama',
        'id_bandara',
        'tujuan_akhir',
        'seat',
        'berangkat',
        'foto',
        'harga',
    ];
}
