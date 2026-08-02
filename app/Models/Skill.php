<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'percentage',
        'icon',
        'sort_order',
    ];

    protected $casts = [
        'percentage' => 'integer',
        'sort_order' => 'integer',
    ];
}
