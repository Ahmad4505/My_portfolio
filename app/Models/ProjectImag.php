<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImag extends Model
{
    use HasFactory;
    protected $fillable = [
    'project_id',
    'image',
];

public function project()
{
    return $this->belongsTo(Project::class);
}
}
