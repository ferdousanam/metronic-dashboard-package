<?php

namespace Anam\Dashboard\database\seeds;

use Anam\Dashboard\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main_menus = array(
            'Dashboard',
//    		'Services',
        );
        foreach ($main_menus as $key => $main_menu) {
            DB::table('menus')->insert([
                'selector' => strtolower($main_menu),
                'serial_no' => $key + 1,
                'menu_name' => $main_menu,
                'route_name' => strtolower($main_menu),
                'route_url' => strtolower($main_menu),
                'icon' => 'fa fa-home',
                'status' => 1,
            ]);
        }

//    	for ($i=1; $i <= 5; $i++) {
//    		DB::table('menus')->insert([
//                'selector' => strtolower('Services-' . $i),
//	        	'menu_id' => 2,
//	        	'serial_no' => $i,
//	        	'menu_name' => 'Services ' . $i,
//	        	'route_name' => ($i == 1) ? '#' : 'services-' . $i,
//	        	'icon' => 'fa fa-hand-o-right',
//	        	'status' => 1,
//	        ]);
//    	}
//
//    	for ($i=1; $i <= 3; $i++) {
//    		DB::table('menus')->insert([
//                'selector' => strtolower('Services-1-' . $i),
//	        	'menu_id' => 3,
//	        	'serial_no' => $i,
//	        	'menu_name' => 'Services 1.' . $i,
//	        	'route_name' => 'services-1-' . $i,
//	        	'icon' => 'fa fa-check',
//	        	'status' => 1,
//	        ]);
//    	}

        self::seedMenus();
    }

    public static function seedMenus()
    {
        $routes = Route::getRoutes();
        $data = ['.index', '.create'];
        $ignore_parents = [
            'admin.',
            'menu',
            'main-menu',
            'sub-menu',
            'user',
            'user-type',
            'user-priority-level',
            'profile',
            'project-details',
            'menu-visibility',
            'passport-status',
        ];

        $parents = [];
        $parent_serial_no = 1;
        $menus = [];
        foreach ($routes->getRoutesByName() as $route) {
            if (count($route->parameterNames()) > 0) {
                continue;
            }
            $as = $route->getAction('as');
            foreach ($ignore_parents as $ignore_parent) {
                if (str_contains($as, $ignore_parent)) {
                    continue 2;
                }
            }
            $child_serial_no = 1;
            foreach ($data as $item) {
                if (str_contains($as, $item)) {
                    $parent = str_replace($item, '', $as);
                    $menu_name = '';
                    if ($item == '.create') {
                        $menu_name .= 'Add New ';
                    }
                    $parent_as = str_replace('.', ' ', str_replace($item, '', $as));
                    $menu_name .= $parent_name = ucwords(str_replace('-', ' ', $parent_as));
                    if ($item == '.index') {
                        $menu_name .= ' List';
                    }
                    if (!in_array($parent, $parents)) {
                        $parents[] = str_replace($item, '', $as);
                        $menus[$parent][] = [
                            'serial_no' => $parent_serial_no++,
                            'menu_name' => $parent_name,
                            'selector' => $parent_as,
                            'route_name' => $parent_as,
                            'route_url' => $route->uri(),
                            'icon' => 'fas fa-hand-point-right',
                            'sidebar_visibility' => 1,
                        ];
                    }
                    $menus[$parent][] = new Menu([
                        'serial_no' => $child_serial_no++,
                        'menu_name' => $menu_name,
                        'selector' => $as,
                        'route_name' => $as,
                        'route_url' => $route->uri(),
                        'icon' => 'fas fa-hand-point-right',
                        'sidebar_visibility' => 1,
                    ]);
                }
            }
        }

        foreach ($menus as $menu) {
            $mainMenu = Menu::create($menu[0]);
            $mainMenu->child()->saveMany(array_slice($menu, 1));
        }
    }
}
