<?php

use Anam\Dashboard\Models\Menu;
use Illuminate\Support\Facades\DB;

function developer_mode() {
    $dev = DB::table('dev_mode_setup')->first();
    return $dev->developer_mode;
}

function dev_details() {
    return DB::table('dev_developer_details')->first();
}

function generate_visibility_menus($menu_id = null)
{
    $menus = Menu::withCount('priorities')
        ->with('child')
        ->where('menu_id', $menu_id)
        ->where('status', 1)
        ->orderBy('serial_no')
        ->get();
    return view('dashboard::devMenuVisibility.menu-list', compact('menus'))->render();
}
