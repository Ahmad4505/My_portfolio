<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'slug',
    'short_description',
    'description',
    'thumbnail',
    'cover_image',
    'github',
    'live_demo',
    'client',
    'project_date',
    'featured',
    'sort_order',
];

    protected $casts = [
        'project_date' => 'date',
        'featured' => 'boolean',
        'sort_order' => 'integer',
    ];
public function images()
{
    return $this->hasMany(ProjectImag::class);
}
}
