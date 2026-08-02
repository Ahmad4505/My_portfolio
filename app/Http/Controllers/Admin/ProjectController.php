<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')
            ->orderByDesc('featured')
            ->orderByDesc('id')
            ->paginate(10);

        return view('Admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('Admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                'unique:projects,title',
            ],

            'short_description' => [
                'required',
                'string',
                'max:500',
            ],

            'description' => [
                'required',
                'string',
            ],

            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:3072',
            ],

            'github' => [
                'nullable',
                'url',
                'max:255',
            ],

            'live_demo' => [
                'nullable',
                'url',
                'max:255',
            ],

            'project_date' => [
                'nullable',
                'date',
            ],

            'featured' => [
                'nullable',
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        $data = [
            'title' => $validated['title'],
            'slug' => $this->generateUniqueSlug($validated['title']),
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'github' => $validated['github'] ?? null,
            'live_demo' => $validated['live_demo'] ?? null,
            'project_date' => $validated['project_date'] ?? null,
            'featured' => $request->boolean('featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                ->store('projects/thumbnails', 'public');
        }

        Project::create($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project added successfully.');
    }

    public function edit(Project $project)
    {
        return view('Admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',

                Rule::unique('projects', 'title')
                    ->ignore($project->id),
            ],

            'short_description' => [
                'required',
                'string',
                'max:500',
            ],

            'description' => [
                'required',
                'string',
            ],

            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:3072',
            ],

            'github' => [
                'nullable',
                'url',
                'max:255',
            ],

            'live_demo' => [
                'nullable',
                'url',
                'max:255',
            ],

            'project_date' => [
                'nullable',
                'date',
            ],

            'featured' => [
                'nullable',
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        $data = [
            'title' => $validated['title'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'github' => $validated['github'] ?? null,
            'live_demo' => $validated['live_demo'] ?? null,
            'project_date' => $validated['project_date'] ?? null,
            'featured' => $request->boolean('featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($project->title !== $validated['title']) {
            $data['slug'] = $this->generateUniqueSlug(
                $validated['title'],
                $project->id
            );
        }

        if ($request->hasFile('thumbnail')) {
            if (
                $project->thumbnail &&
                Storage::disk('public')->exists($project->thumbnail)
            ) {
                Storage::disk('public')->delete($project->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')
                ->store('projects/thumbnails', 'public');
        }

        $project->update($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // تحميل صور المعرض المرتبطة بالمشروع
        $project->load('images');

        // حذف Thumbnail
        if (
            $project->thumbnail &&
            Storage::disk('public')->exists($project->thumbnail)
        ) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        // حذف Cover Image
        if (
            $project->cover_image &&
            Storage::disk('public')->exists($project->cover_image)
        ) {
            Storage::disk('public')->delete($project->cover_image);
        }

        // حذف ملفات صور المعرض
        foreach ($project->images as $image) {
            if (
                $image->image &&
                Storage::disk('public')->exists($image->image)
            ) {
                Storage::disk('public')->delete($image->image);
            }
        }

        // حذف المشروع
        // وإذا عندك cascadeOnDelete سيتم حذف سجلات الصور تلقائيًا
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    private function generateUniqueSlug(
        string $title,
        ?int $ignoreId = null
    ): string {
        $baseSlug = Str::slug($title);

        if (empty($baseSlug)) {
            $baseSlug = 'project';
        }

        $slug = $baseSlug;
        $counter = 1;

        while (
            Project::where('slug', $slug)
            ->when(
                $ignoreId,
                function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                }
            )
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
