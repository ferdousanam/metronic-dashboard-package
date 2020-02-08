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

function generate_visibility_menus($parent_id = 0)
{
    $html = "";
    $menues = Menu::where('parent_id', $parent_id)->where('status', 1)->orderBy('serial_no')->get();
    if ($menues->count() > 0) {
        $html .= "<ul>";
        foreach ($menues as $key => $menu) {
            $has_visibility = Menu::where('sidebar_visibility', 1)->where('id', $menu->id)->first();
            $checked = '';
            if ($has_visibility) {
                $checked = "checked";
            }
            if (($menu->route_name && $menu->route_name == '#') || $menu->parent_id == 0 || siblingsHasChild($menu->parent_id, $menu->id)) {
                $html .= '<li class="col-sm-12">';
                $html .= '<label class="kt-checkbox"><input type="checkbox" name="menu_id[]" value="' . $menu->id . '" id="menu-id-' . $menu->id . '" parent-id="' . $menu->parent_id . '" ' . $checked . '>' . $menu->menu_name . '<span></span></label>';
            } else {
                $html .= '<li class="col-sm-4">';
                $html .= '<label class="kt-checkbox kt-checkbox--success"><input type="checkbox" name="menu_id[]" value="' . $menu->id . '" id="menu-id-' . $menu->id . '" parent-id="' . $menu->parent_id . '" ' . $checked . '>' . $menu->menu_name . '<span></span></label>';
            }
            $html .= generate_visibility_menus($menu->id);

            $html .= "</li>";
        }
        $html .= "</ul>";
    }
    return $html;
}
