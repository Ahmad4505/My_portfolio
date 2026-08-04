<?php

namespace App\Providers;

use App\Models\NavigationItem;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use App\Models\ContactMe;
use Illuminate\Support\ServiceProvider;
use App\Models\Social;
use App\Models\CallToAction;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        Paginator::useBootstrapFive();

        View::composer('User.*', function ($view) {


            $navigationItems = NavigationItem::where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();

            $siteSetting = SiteSetting::first();

            $cta = CallToAction::where('is_active', true)->first();

            $socialLinks = Social::where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();

            $view->with([
                'navigationItems' => $navigationItems,
                'siteSetting' => $siteSetting,
                'socialLinks' => $socialLinks,
                'cta' => $cta,
            ]);
        });


        View::composer('Admin.*', function ($view) {

            $unreadMessagesCount = ContactMe::where('is_read', false)->count();

            $view->with(
                'unreadMessagesCount',
                $unreadMessagesCount
            );
        });
    }
}
