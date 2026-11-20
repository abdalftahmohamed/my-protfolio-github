<?php

namespace App\Providers;

use App\Models\SiteSection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View as ViewFactory;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);

        ViewFactory::composer('*', function (View $view): void {
            $view->with('siteSections', SiteSection::query()->get()->keyBy('key'));
        });
    }
}
