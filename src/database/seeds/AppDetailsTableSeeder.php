<?php

namespace Anam\Dashboard\database\seeds;

use Anam\Dashboard\Models\Project;
use Illuminate\Database\Seeder;

class AppDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
           'app_name' => 'Laravel Dashboard with Metronic 6',
           'company_name' => 'Ferdous Anam',
           'company_address' => 'Dhaka - 1207, Bangladesh',
           'company_contact' => '09638048849',
           'company_logo' => 'logo.png',
           'brand_logo' => 'brand.png',
           'app_icon' => 'favicon.ico',
        ]);
    }
}
