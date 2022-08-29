<?php

namespace Anam\Dashboard\Providers;

use Anam\Dashboard\Models\Menu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Support\Facades\View::composer(['dashboard::layouts.partials._aside._menu'], function (View $view) {
            $mainMenus = Menu::with(['child' => function ($q) {
                $this->menuPriority($q);
            }])->whereNull('menu_id');

            $mainMenus = $this->menuPriority($mainMenus)->get();

            $view->with(compact('mainMenus'));
        });
    }

    protected function menuPriority($q)
    {
        return $q->where('status', 1)
            ->where('sidebar_visibility', 1)
            ->whereHas('priorities', function (Builder $q) {
                $q->where('priority_id', auth()->user()->user_level);
            })
            ->orderBy('serial_no')
            ->orderBy('id');
    }
}
