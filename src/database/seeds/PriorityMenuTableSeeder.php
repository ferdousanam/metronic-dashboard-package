<?php

namespace Anam\Dashboard\database\seeds;

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
        DB::table('priority_menu')->insert([
            'menu_id' => 1,
            'priority_id' => 1,
        ]);
    }
}
