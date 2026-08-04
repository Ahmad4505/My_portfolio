<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroes = HeroSections::latest()->get();

        return view('Admin.hero.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $hero = HeroSections::first();

        return view('Admin.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'button_link' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $hero = HeroSections::first();

        if (!$hero) {
            $hero = new HeroSections();
        }

        $hero->badge = $validated['badge'] ?? null;
        $hero->title = $validated['title'];
        $hero->subtitle = $validated['subtitle'] ?? null;
        $hero->description = $validated['description'] ?? null;
        $hero->button_text = $validated['button_text'] ?? null;
        $hero->button_link = $validated['button_link'] ?? null;
        $hero->is_active = $request->boolean('is_active');

        if ($request->hasFile('image')) {

            if ($hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);

            }

            $hero->image = $request->file('image')
                ->store('hero', 'public');
        }

        $hero->save();

        return redirect()
            ->route('Admin.hero.edit')
            ->with('success', 'Hero section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
