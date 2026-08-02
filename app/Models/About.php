<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'experience_years',
        'completed_projects',
        'happy_clients',
    ];

    protected $casts = [
        'experience_years' => 'integer',
        'completed_projects' => 'integer',
        'happy_clients' => 'integer',
    ];
}
