<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserReps;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(100)->create();
         UserReps::factory(100)->create();
        /*
         *
         $this->call([
           UserSeeder::class,
          // UserReps::class
        ]);
        */
    }
}
