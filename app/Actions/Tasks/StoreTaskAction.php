<?php

namespace App\Actions\Tasks;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class StoreTaskAction
{
    public function execute(array $data): Task
    {
        $newTask = Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        if (isset($data['tags'])) {
            // Loop through passed in Tags
            // if tag exists, attach to newTask
            // If not, create then attacch
        }


        return $newTask;
    }
}
