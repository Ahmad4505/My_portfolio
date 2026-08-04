<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function edit()
    {
        $about = About::first();

        return view('Admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'experience_years' => ['required', 'integer', 'min:0'],
            'completed_projects' => ['required', 'integer', 'min:0'],
            'happy_clients' => ['required', 'integer', 'min:0'],
        ]);

        $about = About::firstOrNew();

        $about->title = $validated['title'];
        $about->description = $validated['description'];
        $about->experience_years = $validated['experience_years'];
        $about->completed_projects = $validated['completed_projects'];
        $about->happy_clients = $validated['happy_clients'];

        if ($request->hasFile('image')) {
            if (
                $about->image &&
                Storage::disk('public')->exists($about->image)
            ) {
                Storage::disk('public')->delete($about->image);
            }

            $about->image = $request->file('image')
                ->store('about', 'public');
        }

        $about->save();

        return redirect()
            ->route('Admin.about.edit')
            ->with('success', 'About section updated successfully.');
    }
}
