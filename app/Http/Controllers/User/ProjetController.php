<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjetController extends Controller
{
    /**
     * عرض جميع المشاريع مع Pagination.
     */
    public function index()
    {
        $projects = Project::orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(6);

        return view('User.projects.index', compact('projects'));
    }

    /**
     * عرض تفاصيل مشروع واحد.
     */
    public function show(string $slug)
    {
        $project = Project::with('images')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('User.projects.show', compact('project'));
    }
}
