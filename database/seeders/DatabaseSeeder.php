<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Richardo',
            'email' => 'richardo@gmail.com',
            'password' => Hash::make('123456'),
            'picture' => 'https://www.mecgale.com/wp-content/uploads/2017/08/dummy-profile.png'

        ]);
    }
}
