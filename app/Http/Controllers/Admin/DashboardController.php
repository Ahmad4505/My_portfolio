<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMe;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $statistics = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
            'messages' => ContactMe::count(),
            'unread_messages' => ContactMe::where('is_read', false)->count(),
        ];

        $latestProjects = Project::latest()
            ->take(5)
            ->get();

        $latestMessages = ContactMe::latest()
            ->take(5)
            ->get();

        return view('Admin.dashboard.index', compact(
            'statistics',
            'latestProjects',
            'latestMessages'
        ));
    }
}
