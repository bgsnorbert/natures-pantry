<?php

namespace App\Providers;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
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
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
        // to eager load sql relationship for minimizing sql queries
        // Model::preventLazyLoading();

        // Paginator::defaultView();
        Paginator::useTailwind();

        // register admin middleware
        Route::middleware('admin', AdminMiddleware::class);
    }
}
