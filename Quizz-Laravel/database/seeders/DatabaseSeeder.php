<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        // User::factory(10)->create()->each(function($user){
        //     Role::factory(rand(1,2))->create([
        //     'user_id' => $user->id,
        //     'role_id' => ($user->random(1)->first())->id
        // ]);
        // });
    }
}
