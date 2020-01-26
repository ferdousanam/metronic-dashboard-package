<?php

namespace Anam\Dashboard\database\seeds;

use App\Models\Admin\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Ferdous Anam',
           'email' => 'ferdous.anam@gmail.com',
           'password' => Hash::make('12345678'),
            'user_level' => 1,
            'status' => 1,
        ]);
    }
}
