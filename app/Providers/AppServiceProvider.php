<?php

/**
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @copyright Copyright (c) 2020, Nezuko - Content Management System
 */

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::include('partials.head-meta', 'headMeta');
        Blade::include('partials.head-css', 'headCss');
        Blade::include('partials.topbar', 'topbar');
        Blade::include('partials.footer', 'footer');
        Blade::include('partials.footer-js', 'footerJs');
        Blade::include('partials.pagination', 'pagination');
        Blade::include('partials.validation', 'validation');

        View::composer(
            'layouts.dashboard', 'App\Http\View\Composers\LayoutComposer'
        );
    }
}
