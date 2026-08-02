<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSections extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'subtitle',
    'description',
    'button_text',
    'button_link',
    'badge',
    'image',
    'is_active',
];
    protected $casts = [
        'is_active' => 'boolean',
    ];

}



