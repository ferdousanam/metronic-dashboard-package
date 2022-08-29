<?php

use Illuminate\Routing\Route;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Facades\Route as RouteFacade;
use Illuminate\Support\Str;

class GetRoute
{
    protected $routeList;

    public function __construct()
    {
        $this->routeList = RouteFacade::getRoutes();
    }

    public function getRouteList(): RouteCollectionInterface
    {
        return $this->routeList;
    }

    public function getAsPrefix(Route $route): string
    {
        return str_replace($route->getActionMethod(), '', $route->getAction('as'));
    }

    public function getFormUrl(Route $route): string
    {
        if ($route->getActionMethod() == 'create') {
            return route($this->getAsPrefix($route) . 'store', $route->parameters());
        }
        if ($route->getActionMethod() == 'edit') {
            return route($this->getAsPrefix($route) . 'update', $route->parameters());
        }

        return '';
    }

    public function pageTitle(Route $route): string
    {
        $parent_as = str_replace('.', ' ', str_replace('.' . $route->getActionMethod(), '', $route->getAction('as')));
        return Str::singular(ucwords(str_replace('-', ' ', $parent_as)));
    }

    public function getTitleByRoute(Route $route): string
    {
        $title = '';
        if ($route->getActionMethod() == 'create') {
            $title .= 'Add New ';
        } else if ($route->getActionMethod() == 'edit') {
            $title .= 'Edit ';
        } else if ($route->getActionMethod() == 'show') {
            $title .= 'View ';
        }
        $title .= $this->pageTitle($route);
        if ($route->getActionMethod() == 'index') {
            $title .= ' List';
        }
        return $title;
    }

    public function getTitleByRouteName(string $routeName): string
    {
        return $this->getTitleByRoute($this->getRouteList()->getByName($routeName));
    }
}
