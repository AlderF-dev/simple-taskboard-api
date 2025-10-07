<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        //Create Tags
        $tags = Tag::factory()->count(12)->create();

        // Create Tasks
        Task::factory()->count(6)->create()->each(function ($task) use ($tags) {
            $randomTags = $tags->random(rand(0, 5))->pluck('id');

            $task->tags()->syncWithoutDetaching($randomTags);
        });
    }
}
