<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectGalleryController extends Controller
{
    public function index(Project $project)
    {
        $project->load('images');

        return view(
            'Admin.projects.gallery',
            compact('project')
        );
    }

    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'images' => [
                'required',
                'array',
                'min:1',
            ],

            'images.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:3072',
            ],
        ]);

        foreach ($validated['images'] as $image) {
            $path = $image->store(
                'projects/gallery',
                'public'
            );

            $project->images()->create([
                'image' => $path,
            ]);
        }

        return redirect()
            ->route('Admin.projects.gallery.index', $project)
            ->with('success', 'Project images uploaded successfully.');
    }

    public function destroy(
        Project $project,
        ProjectImag $projectImag
    ) {
        if ($projectImag->project_id !== $project->id) {
            abort(404);
        }

        if (
            $projectImag->image &&
            Storage::disk('public')->exists($projectImag->image)
        ) {
            Storage::disk('public')->delete($projectImag->image);
        }

        $projectImag->delete();

        return redirect()
            ->route('Admin.projects.gallery.index', $project)
            ->with('success', 'Project image deleted successfully.');
    }
}
