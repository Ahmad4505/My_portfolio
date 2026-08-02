<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavigationItem;
use Illuminate\Http\Request;

class NavigationItemController extends Controller
{
    public function index()
    {
        $navigationItems = NavigationItem::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'Admin.navigation_items.index',
            compact('navigationItems')
        );
    }

    public function create()
    {
        return view('Admin.navigation_items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        NavigationItem::create([
            'title' => $validated['title'],
            'url' => $validated['url'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.navigation-items.index')
            ->with('success', 'Navigation item added successfully.');
    }

    public function edit(NavigationItem $navigationItem)
    {
        return view(
            'Admin.navigation_items.edit',
            compact('navigationItem')
        );
    }

    public function update(
        Request $request,
        NavigationItem $navigationItem
    ) {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $navigationItem->update([
            'title' => $validated['title'],
            'url' => $validated['url'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.navigation-items.index')
            ->with('success', 'Navigation item updated successfully.');
    }

    public function destroy(NavigationItem $navigationItem)
    {
        $navigationItem->delete();

        return redirect()
            ->route('admin.navigation-items.index')
            ->with('success', 'Navigation item deleted successfully.');
    }
}
