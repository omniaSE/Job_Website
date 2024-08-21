<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Job;
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
       /*  $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]); */
        User::factory()->create([
            'first_name' => 'Omnia' ,
            'last_name' => 'Taha' ,
            'email' => 'omniataha@gmail.com'
        ]);

        Job::factory(20)->create();
    }
}
