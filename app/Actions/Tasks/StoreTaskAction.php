<?php

namespace App\Actions\Tasks;

use App\Actions\Tags\StoreAttachTagsAction;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class StoreTaskAction
{
    public function execute(array $data): Task
    {
        return Task::create([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
        ]);
    }
}
