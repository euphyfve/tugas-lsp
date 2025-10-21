<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bandara extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
        'contact',
    ];
}
