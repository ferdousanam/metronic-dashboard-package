<?php

namespace Anam\Dashboard;

use Anam\Dashboard\Providers\RouteServiceProvider;
use Anam\Dashboard\Providers\SeedServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(SeedServiceProvider::class);
        $this->app->register(DashboardServiceProvider::class);
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/dev.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'dashboard');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/publish/Models' => app_path('Models'),
            __DIR__ . '/publish/Http/Controllers' => app_path('Http/Controllers'),
            __DIR__ . '/publish/views' => resource_path('views'),
            __DIR__ . '/publish/routes' => base_path('routes'),
            __DIR__ . '/public/public' => public_path('/'),
            __DIR__ . '/public/assets' => public_path('vendor/dashboard/assets'),
            __DIR__ . '/public/datatables' => public_path('vendor/datatables'),
        ], 'dashboard');
        $this->registerHelpers();
        $router->aliasMiddleware('CheckSuperUser', \Anam\Dashboard\app\Http\Middleware\CheckSuperUser::class);
        $router->aliasMiddleware('checkPermission', \Anam\Dashboard\app\Http\Middleware\checkPermission::class);
    }

    public function register()
    {

    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {
        if (file_exists($file = (__DIR__ . '/app/Http/Helpers/DevOptions.php'))) {
            require_once($file);
        }
        if (file_exists($file = (__DIR__ . '/app/Http/Helpers/Menus.php'))) {
            require_once($file);
        }
        if (file_exists($file = (__DIR__ . '/app/Http/Helpers/ProjectInfo.php'))) {
            require_once($file);
        }
        if (file_exists($file = (__DIR__ . '/app/Http/Helpers/Users.php'))) {
            require_once($file);
        }
    }
}
