<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

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


        /*ParentArticleCategory*/
        Route::bind('parentArticleCategory',function ($value) {
            return Category::where('parent_id',0)->where('type','article')->whereSlug($value)->firstOrFail();
        });
        /*ParentArticleCategory*/

        /*ChildArticleCategory*/
        Route::bind('childArticleCategory',function ($value) {
            return Category::where('parent_id','!=',0)->where('type','article')->whereSlug($value)->firstOrFail();
        });
        /*ChildArticleCategory*/

        /*ArticleDetail*/
        Route::bind('ArticleDetail',function ($value) {
            $article = Article::whereSlug($value)->firstOrFail();
            if($article && auth()->check() && Gate::allows('admin')) {
                return $article;
            }
            return Article::where('is_active','1')->whereSlug($value)->firstOrFail();
        });
        /*ArticleDetail*/


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
            ->prefix('admin-panel/')
            ->name('admin.')
            ->group(function () {
                foreach (glob(base_path('routes/web/admin/*.php')) as $fileName) {
                    require $fileName;
                }
            });
    }

    private function mapPublicRoutes()
    {
        Route::middleware(['web','HtmlOptimize','Visit'])
            ->group(function () {
                foreach (glob(base_path('routes/web/public/*.php')) as $fileName) {
                    require $fileName;
                }
            });
    }

    private function mapUserPanelRoutes()
    {
        Route::middleware(['web','HtmlOptimize','auth','verify','Visit'])
            ->prefix('user-panel/')
            ->name('user-panel.')
            ->group(function () {
                foreach (glob(base_path('routes/web/user-panel/*.php')) as $fileName) {
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
