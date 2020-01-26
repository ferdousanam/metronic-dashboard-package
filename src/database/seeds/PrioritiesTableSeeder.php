<?php

namespace Anam\Dashboard\database\seeds;

use Anam\Dashboard\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::create([
           'priority_name' => 'Super Admin',
           'priority_description' => 'Super Admin. This user has complete control in the application.',
           'priority_status' => 1,
        ]);
    }
}
