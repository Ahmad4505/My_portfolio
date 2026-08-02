<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallToAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CallToActionController extends Controller
{
    /**
     * Show the CTA edit page.
     */
    public function edit()
    {
        $cta = CallToAction::first();

        return view('Admin.cta.edit', compact('cta'));
    }

    /**
     * Update or create the CTA section.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'button_text' => [
                'required',
                'string',
                'max:100',
            ],

            'button_link' => [
                'required',
                'string',
                'max:500',
            ],

            'background_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:3072',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $cta = CallToAction::firstOrNew();

        $cta->title = $validated['title'];

        $cta->description =
            $validated['description'] ?? null;

        $cta->button_text =
            $validated['button_text'];

        $cta->button_link =
            $validated['button_link'];

        $cta->is_active =
            $request->boolean('is_active');

        if ($request->hasFile('background_image')) {
            $disk = Storage::disk('public');

            if (
                $cta->background_image &&
                $disk->exists($cta->background_image)
            ) {
                $disk->delete($cta->background_image);
            }

            $cta->background_image =
                $request->file('background_image')
                    ->store('cta', 'public');
        }

        $cta->save();

        return redirect()
            ->route('admin.cta.edit')
            ->with(
                'success',
                'Call to action section updated successfully.'
            );
    }
}
