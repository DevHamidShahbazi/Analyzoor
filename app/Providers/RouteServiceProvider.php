<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';


    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $this->mapAuthRoutes();
            $this->mapAdminRoutes();
            $this->mapPublicRoutes();
            $this->mapUserPanelRoutes();
        });

    }


    private function mapAuthRoutes()
    {
        Route::middleware(['web','HtmlOptimize'])
            ->group(function () {
                foreach (glob(base_path('routes/web/auth/*.php')) as $fileName) {
                    require $fileName;
                }
            });
    }

    private function mapAdminRoutes()
    {
        Route::middleware(['web','auth','verify','LevelAdmin'])
            ->prefix('admin/')
            ->name('admin.')
            ->group(function () {
                foreach (glob(base_path('routes/web/admin/*.php')) as $fileName) {
                    require $fileName;
                }
            });
    }

    private function mapPublicRoutes()
    {
        Route::middleware(['web','HtmlOptimize'])
            ->group(function () {
                foreach (glob(base_path('routes/web/public/*.php')) as $fileName) {
                    require $fileName;
                }
            });
    }

    private function mapUserPanelRoutes()
    {
        Route::middleware(['web','HtmlOptimize','auth','verify'])
            ->prefix('user-panel/')
            ->name('userPanel.')
            ->group(function () {
                foreach (glob(base_path('routes/web/userPanel/*.php')) as $fileName) {
                    require $fileName;
                }
            });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
