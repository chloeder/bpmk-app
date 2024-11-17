<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SahabatDoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jurusan',
        'no_hp',
        'pokok_doa',
    ];
}
