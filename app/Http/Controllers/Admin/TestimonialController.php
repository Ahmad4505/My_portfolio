<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view(
            'Admin.testimonials.index',
            compact('testimonials')
        );
    }

    public function create()
    {
        return view('Admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => [
                'required',
                'string',
                'max:255',
            ],

            'job_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'company' => [
                'nullable',
                'string',
                'max:255',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'review' => [
                'required',
                'string',
            ],

            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $data = [
            'client_name' => $validated['client_name'],
            'job_title' => $validated['job_title'] ?? null,
            'company' => $validated['company'] ?? null,
            'review' => $validated['review'],
            'rating' => $validated['rating'],
            'is_active' => $request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return redirect()
            ->route('Admin.testimonials.index')
            ->with('success', 'Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view(
            'Admin.testimonials.edit',
            compact('testimonial')
        );
    }

    public function update(
        Request $request,
        Testimonial $testimonial
    ) {
        $validated = $request->validate([
            'client_name' => [
                'required',
                'string',
                'max:255',
            ],

            'job_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'company' => [
                'nullable',
                'string',
                'max:255',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'review' => [
                'required',
                'string',
            ],

            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $data = [
            'client_name' => $validated['client_name'],
            'job_title' => $validated['job_title'] ?? null,
            'company' => $validated['company'] ?? null,
            'review' => $validated['review'],
            'rating' => $validated['rating'],
            'is_active' => $request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {
            if (
                $testimonial->image &&
                Storage::disk('public')->exists($testimonial->image)
            ) {
                Storage::disk('public')
                    ->delete($testimonial->image);
            }

            $data['image'] = $request->file('image')
                ->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()
            ->route('Admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function toggleStatus(Testimonial $testimonial)
    {
        $testimonial->update([
            'is_active' => !$testimonial->is_active,
        ]);

        $message = $testimonial->is_active
            ? 'Testimonial is now visible.'
            : 'Testimonial is now hidden.';

        return redirect()
            ->route('Admin.testimonials.index')
            ->with('success', $message);
    }

    public function destroy(Testimonial $testimonial)
    {
        if (
            $testimonial->image &&
            Storage::disk('public')->exists($testimonial->image)
        ) {
            Storage::disk('public')
                ->delete($testimonial->image);
        }

        $testimonial->delete();

        return redirect()
            ->route('Admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
