<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // 前台網頁 Route 設定
        Route::domain(env('WEB_DOMAIN', 'localhost'))
        ->middleware('web') //這個是使用 app/Http/kernel.php 裡面的 middlewareGroups
        ->namespace($this->namespace)
        ->group(base_path('routes/web.php'));

        // 後台網頁 Route 設定
        Route::domain(env('ADMIN_DOMAIN', 'admin.localhost'))
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin.php'));

        //API Route 設定
        Route::domain(env('API_DOMAIN', 'api.localhost'))
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api.php'));
    }
}
