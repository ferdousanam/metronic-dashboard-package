<?php

namespace Anam\Dashboard\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
    		'Services',
    	);
    	foreach ($main_menus as $key => $main_menu) {
	    	DB::table('menus')->insert([
                'selector' => strtolower($main_menu),
                'parent_id' => 0,
                'serial_no' => $key+1,
                'menu_name' => $main_menu,
	        	'route_name' => strtolower($main_menu),
	        	'icon' => 'fa fa-home',
	        	'status' => 1,
	        ]);
    	}

    	for ($i=1; $i <= 5; $i++) {
    		DB::table('menus')->insert([
                'selector' => strtolower('Services-' . $i),
	        	'parent_id' => 2,
	        	'serial_no' => $i,
	        	'menu_name' => 'Services ' . $i,
	        	'route_name' => 'services-' . $i,
	        	'icon' => 'fa fa-hand-o-right',
	        	'status' => 1,
	        ]);
    	}

    	for ($i=1; $i <= 3; $i++) {
    		DB::table('menus')->insert([
                'selector' => strtolower('Services-1-' . $i),
	        	'parent_id' => 3,
	        	'serial_no' => $i,
	        	'menu_name' => 'Services 1.' . $i,
	        	'route_name' => 'services-1-' . $i,
	        	'icon' => 'fa fa-check',
	        	'status' => 1,
	        ]);
    	}

    }
}
