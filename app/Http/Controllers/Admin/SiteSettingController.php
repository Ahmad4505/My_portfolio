<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $setting = SiteSetting::first();

        return view('Admin.site-settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            'favicon' => [
                'nullable',
                'mimes:ico,png,jpg,jpeg,webp',
                'max:1024',
            ],

            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',


            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string'],

            'footer_text' => ['nullable', 'string'],
            'copyright' => ['nullable', 'string', 'max:255'],

            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string'],

            'navbar_button_text' => ['nullable', 'string', 'max:100'],
            'navbar_button_link' => ['nullable', 'string', 'max:255'],
            'navbar_button_active' => ['nullable', 'boolean'],
        ]);

        $setting = SiteSetting::firstOrNew();

        $setting->site_name = $validated['site_name'];

        $setting->email = $validated['email'] ?? null;
        $setting->phone = $validated['phone'] ?? null;
        $setting->address = $validated['address'] ?? null;

        $setting->footer_text = $validated['footer_text'] ?? null;
        $setting->copyright = $validated['copyright'] ?? null;

        $setting->meta_title = $validated['meta_title'] ?? null;
        $setting->meta_description = $validated['meta_description'] ?? null;
        $setting->keywords = $validated['keywords'] ?? null;

        $setting->navbar_button_text =
            $validated['navbar_button_text'] ?? null;

        $setting->navbar_button_link =
            $validated['navbar_button_link'] ?? null;

        $setting->navbar_button_active =
            $request->boolean('navbar_button_active');

        if ($request->hasFile('logo')) {
            if (
                $setting->logo &&
                Storage::disk('public')->exists($setting->logo)
            ) {
                Storage::disk('public')->delete($setting->logo);
            }

            $setting->logo = $request->file('logo')
                ->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            if (
                $setting->favicon &&
                Storage::disk('public')->exists($setting->favicon)
            ) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $setting->favicon = $request->file('favicon')
                ->store('settings', 'public');
        }


        if ($request->hasFile('cv_file')) {

            if (
                $setting->cv_file &&
                Storage::disk('public')->exists($setting->cv_file)
            ) {
                Storage::disk('public')->delete($setting->cv_file);
            }

            $setting->cv_file = $request->file('cv_file')
                ->store('cv', 'public');
        }

        $setting->save();

        return redirect()
            ->route('admin.site-settings.edit')
            ->with('success', 'Site settings updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
