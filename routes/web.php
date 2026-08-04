<?php

use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\CallToActionController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\NavigationItemController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectGalleryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProjetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


////////////////////////// User Routes

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Route::get('/projects', [ProjetController::class, 'index'])->name('profile.index');

/// projects Route

Route::get('/projects', [ProjetController::class, 'index'])
    ->name('projects.index');

Route::get('/projects/{slug}', [ProjetController::class, 'show'])
    ->name('projects.show');

//contact routes
Route::get('/contact-me', [ContactController::class, 'index'])
    ->name('contact');

Route::post('/contact-me', [ContactController::class, 'store'])
    ->name('contact.store');

// CV route

Route::get('/download-cv', [CvController::class, 'download'])
    ->name('cv.download');

//////////////////////// Admin Routes

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('Admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        //hero section route
        Route::get('/hero', [HeroSectionController::class, 'edit'])
            ->name('hero.edit');

        Route::put('/hero', [HeroSectionController::class, 'update'])
            ->name('hero.update');

        //nave edit routes

        Route::resource('navigation-items', NavigationItemController::class)
            ->except(['show']);

        // site-settings route

        Route::get('/site-settings', [SiteSettingController::class, 'edit'])
            ->name('site-settings.edit');

        Route::put('/site-settings', [SiteSettingController::class, 'update'])
            ->name('site-settings.update');

        // skills routes
        Route::resource('skills', SkillController::class)
            ->except(['show']);

        // service route

        Route::resource('services', ServiceController::class)
            ->except(['show']);

        // about section Routes

        Route::get('/about', [AboutSectionController::class, 'edit'])
            ->name('about.edit');

        Route::put('/about', [AboutSectionController::class, 'update'])
            ->name('about.update');

        //testimonials Route

        Route::patch(
            '/testimonials/{testimonial}/toggle-status',
            [TestimonialController::class, 'toggleStatus']
        )->name('testimonials.toggle-status');

        Route::resource('testimonials', TestimonialController::class)
            ->except(['show']);



        ////ProjectGallery routes

        Route::get(
            '/projects/{project}/gallery',
            [ProjectGalleryController::class, 'index']
        )->name('projects.gallery.index');

        Route::post(
            '/projects/{project}/gallery',
            [ProjectGalleryController::class, 'store']
        )->name('projects.gallery.store');

        Route::delete(
            '/projects/{project}/gallery/{projectImag}',
            [ProjectGalleryController::class, 'destroy']
        )->name('projects.gallery.destroy');


        // projects route
        Route::resource('projects', ProjectController::class)
            ->except(['show']);


        /// mesage route

        Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');

        Route::patch('/messages/{message}/mark-unread', [ContactMessageController::class, 'markUnread'])->name('messages.mark-unread');

        Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');

        Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

        //SocialLink routes
        Route::patch(
            '/social-links/{socialLink}/toggle-status',
            [SocialLinkController::class, 'toggleStatus']
        )->name('social-links.toggle-status');

        Route::resource('social-links', SocialLinkController::class)->except(['show']);

        // CallToAction Routes

        Route::get('/call-to-action', [CallToActionController::class, 'edit'])
            ->name('cta.edit');

        Route::put('/call-to-action', [CallToActionController::class, 'update'])
            ->name('cta.update');
    });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
