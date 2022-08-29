<?php

namespace Anam\Dashboard\database\seeds;

use Anam\Dashboard\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriorityMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::select('id')->where('status', 1)->get();
        $priorityMenus = [];
        foreach ($menus as $menu) {
            $priorityMenus[] = [
                'menu_id' => $menu->id,
                'priority_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('priority_menu')->insert($priorityMenus);
    }
}
