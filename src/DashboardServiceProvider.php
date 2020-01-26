<?php

namespace Anam\Dashboard;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $this->app->register(DashboardServiceProvider::class);
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/dev.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'dashboard');
        $this->publishes([
            __DIR__ . '/publish/Models' => app_path('Models'),
            __DIR__ . '/public/public' => public_path('/'),
            __DIR__ . '/public/assets' => public_path('vendor/dashboard/assets'),
            __DIR__ . '/public/datatables' => public_path('vendor/datatables'),
        ], 'dashboard');
        $this->registerHelpers();
        $router->aliasMiddleware('CheckSuperUser', \Anam\Dashboard\Http\Middleware\CheckSuperUser::class);
        $router->aliasMiddleware('checkPermission', \Anam\Dashboard\Http\Middleware\checkPermission::class);
    }

    public function register()
    {

    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {
        if (file_exists($file = (__DIR__ . '/Http/Helpers/DevOptions.php'))) {
            require_once($file);
        }
        if (file_exists($file = (__DIR__ . '/Http/Helpers/Menus.php'))) {
            require_once($file);
        }
        if (file_exists($file = (__DIR__ . '/Http/Helpers/ProjectInfo.php'))) {
            require_once($file);
        }
        if (file_exists($file = (__DIR__ . '/Http/Helpers/Users.php'))) {
            require_once($file);
        }
    }
}
