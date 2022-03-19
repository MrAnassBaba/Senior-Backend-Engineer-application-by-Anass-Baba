<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_reps')->insert([
            'user_id' => rand(5,20),
            'name' => Str::random(15),
            'description' => Str::random(2000),
            'urlRps' => 'git@github.com:MrAnassBaba/'.Str::random(2000)
        ]);
    }
}
