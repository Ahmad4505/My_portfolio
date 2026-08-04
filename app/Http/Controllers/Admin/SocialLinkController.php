<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = Social::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'Admin.social_links.index',
            compact('socialLinks')
        );
    }

    public function create()
    {
        return view('Admin.social_links.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => [
                'required',
                'string',
                'max:100',
            ],

            'url' => [
                'required',
                'string',
                'max:500',
            ],

            'icon' => [
                'nullable',
                'string',
                'max:255',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        Social::create([
            'platform' => $validated['platform'],
            'url' => $validated['url'],
            'icon' => $validated['icon'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('Admin.social-links.index')
            ->with('success', 'Social link added successfully.');
    }

    public function edit(Social $socialLink)
    {
        return view(
            'Admin.social_links.edit',
            compact('socialLink')
        );
    }

    public function update(
        Request $request,
        Social $socialLink
    ) {
        $validated = $request->validate([
            'platform' => [
                'required',
                'string',
                'max:100',
            ],

            'url' => [
                'required',
                'string',
                'max:500',
            ],

            'icon' => [
                'nullable',
                'string',
                'max:255',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $socialLink->update([
            'platform' => $validated['platform'],
            'url' => $validated['url'],
            'icon' => $validated['icon'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('Admin.social-links.index')
            ->with('success', 'Social link updated successfully.');
    }

    public function toggleStatus(Social $socialLink)
    {
        $socialLink->update([
            'is_active' => !$socialLink->is_active,
        ]);

        return redirect()
            ->route('Admin.social-links.index')
            ->with(
                'success',
                $socialLink->is_active
                    ? 'Social link is now visible.'
                    : 'Social link is now hidden.'
            );
    }

    public function destroy(Social $socialLink)
    {
        $socialLink->delete();

        return redirect()
            ->route('Admin.social-links.index')
            ->with('success', 'Social link deleted successfully.');
    }
}
