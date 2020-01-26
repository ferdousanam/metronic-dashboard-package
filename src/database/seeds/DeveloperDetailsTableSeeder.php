<?php

namespace Anam\Dashboard\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dev_developer_details')->insert([
            'dev_name' => 'Ferdous Anam',
            'dev_website' => 'https://ferdousanam.com',
            'dev_footer' => null,
        ]);
    }
}
