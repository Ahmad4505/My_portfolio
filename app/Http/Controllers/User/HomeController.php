<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\HeroSections;
use App\Models\Service;
use App\Models\Skill;
use App\Models\About;
use App\Models\Project;
use App\Models\Testimonial;

class HomeController extends Controller
{
  public function index()
{
    $hero = HeroSections::where('is_active', true)->first();

    $about = About::first();

    $skills = Skill::orderBy('sort_order')
        ->orderBy('id')
        ->get();

    $services = Service::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    $testimonials = Testimonial::where('is_active', true)
        ->latest()
        ->get();

    // عرض 4 مشاريع فقط في الصفحة الرئيسية
    $projects = Project::orderByDesc('featured')
        ->orderBy('sort_order')
        ->orderByDesc('id')
        ->limit(4)
        ->get();

    return view('User.home', compact(
        'hero',
        'about',
        'skills',
        'services',
        'testimonials',
        'projects'
    ));
}
}
