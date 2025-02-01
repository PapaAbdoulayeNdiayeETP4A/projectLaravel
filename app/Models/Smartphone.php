<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Smartphone extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'marque',
        'description',
        'prix',
        'photo',
        'ram',
        'rom',
        'ecran',
        'couleurs'
    ];

    protected $casts = [
        'couleurs' => 'array' // Cast JSON en tableau PHP
    ];
}
