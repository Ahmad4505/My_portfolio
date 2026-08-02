<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CvController extends Controller
{
    /**
     * Download the current CV.
     */
    public function download(): StreamedResponse
    {
        $setting = SiteSetting::query()->first();

        abort_if(
            !$setting || empty($setting->cv_file),
            Response::HTTP_NOT_FOUND,
            'CV file is not available.'
        );

        $disk = Storage::disk('public');

        abort_unless(
            $disk->exists($setting->cv_file),
            Response::HTTP_NOT_FOUND,
            'CV file was not found.'
        );

        return $disk->download(
            $setting->cv_file,
            $this->generateDownloadName($setting)
        );
    }

    /**
     * Generate a clean CV download filename.
     */
    private function generateDownloadName(
        SiteSetting $setting
    ): string {
        $extension = pathinfo(
            $setting->cv_file,
            PATHINFO_EXTENSION
        );

        $siteName = Str::slug(
            $setting->site_name ?: 'portfolio'
        );

        return $siteName . '-cv.' . strtolower($extension);
    }
}
