<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

protected $fillable = [
    'site_name',
    'logo',
    'favicon',
    'cv_file',
    'email',
    'phone',
    'address',
    'footer_text',
    'copyright',
    'meta_title',
    'meta_description',
    'keywords',
    'navbar_button_text',
    'navbar_button_link',
    'navbar_button_active',
];

protected $casts = [
    'navbar_button_active' => 'boolean',
];
}
