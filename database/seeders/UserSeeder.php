<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name' => Str::random(15),
           'email' => $this->faker->unique()->safeEmail(),
           'password' => Hash::make('password'),
           'gitUsername' => Str::random(5),
           'gitCountRpViews' => rand(5,10000),
           'gitCountRps' => rand(5,10000)
        ]);
    }
}
