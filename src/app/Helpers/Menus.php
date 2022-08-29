<?php

use Anam\Dashboard\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// This multi level menu function is for aside menus
function generate_multilevel_menus($menu_id = 0)
{
    $priority_id = Auth::user()->user_level;
    $html = "";
    $menues = Menu::where('menu_id', $menu_id)->where('status', 1)->where('sidebar_visibility', 1)->orderBy('serial_no')->get();

    if ($menues->count() > 0) {
        foreach ($menues as $key => $menu) {
            $has_access = DB::table('priority_menu')->where('priority_id', $priority_id)->where('menu_id', $menu->id)->first();
            if ($has_access) {
                if ($menu->route_name && $menu->route_name == '#') {
                    $html .= '<li id="' . $menu->selector . '-mm" class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle">';
                    if ($menu->menu_id == 0) {
                        if ($menu->icon) {
                            $html .= '<i class="kt-menu__link-icon ' . $menu->icon . '"></i>';
                        }
                    } else {
                        $html .= '<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>';
                    }
                    $html .= '<span class="kt-menu__link-text">';
                    $html .= $menu->menu_name; // $menu->menu_id
                    $html .= '</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>';
                    $html .= '<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>';
                    $html .= '<ul class="kt-menu__subnav">';
                    $html .= '<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">';
                    $html .= '<span class="kt-menu__link"><span class="kt-menu__link-text">User</span></span>';
                    $html .= '</li>';
                    $html .= generate_multilevel_menus($menu->id);
                    $html .= '</ul>';
                    $html .= '</div>';
                    $html .= '</li>';
                } else {
                    if ($menu->menu_id == 0) {
                        $html .= '<li id="' . $menu->selector . '-mm" class="kt-menu__item " aria-haspopup="true">';
                        $html .= '<a href="' . url(routePrefix($menu->route_name)) . '" class="kt-menu__link ">';
                        if ($menu->icon) {
                            $html .= '<i class="kt-menu__link-icon ' . $menu->icon . '"></i>';
                        }
                    } else {
                        $html .= '<li id="' . $menu->selector . '-sm" class="kt-menu__item " aria-haspopup="true">';
                        $html .= '<a href="' . url(routePrefix($menu->route_name)) . '" class="kt-menu__link ">';
                        $html .= '<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>';
                    }
                    $html .= '<span class="kt-menu__link-text">';
                    $html .= $menu->menu_name; // $menu->menu_id
                    $html .= '</span></a></li>';
                    $html .= generate_multilevel_menus($menu->id);
                }
            }
        }
    }
    return $html;
}

function generate_priority_menus($priority_id, $menu_id = null)
{
    $menus = Menu::withCount('priorities')
        ->with('child')
        ->where('menu_id', $menu_id)
        ->where('status', 1)
        ->orderBy('serial_no')
        ->get();
    return view('dashboard::userPriorityLevel.menu-list', compact('menus', 'priority_id'))->render();
}