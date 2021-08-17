<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        $this->call( UserSeeder::class );
        $this->call( TaskSeeder::class );

        $users = User::all();
        $usersId;
        foreach($users as $user)
        {
            $usersId[$user->id] = $user->id; 
        }

        $tasks = Task::all();
        foreach($tasks as $task)
        {   
            $user_rand = array_rand($usersId, 3);
            $task->users()->attach([ $usersId[$user_rand[0]], $usersId[$user_rand[1]], $usersId[$user_rand[2]] ]);
        }
    }
}
