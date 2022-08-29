<?php

use Anam\Dashboard\Models\Project;

function project()
{
    return Project::first();
}

function brandLogo()
{
    return asset('uploads/project-info/' . Project::first()->brand_logo);
}

function routePrefix($url = null)
{
    $prefix = trim(config('dashboard.route_prefix', '/'), '/');
    if ($prefix) {
        return $prefix . '/' . trim($url, '/');
    }
    return trim($url, '/');
}
