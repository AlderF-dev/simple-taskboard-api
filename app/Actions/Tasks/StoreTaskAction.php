<?php

namespace App\Actions\Tasks;

use App\Actions\Tags\StoreAttachTagsAction;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class StoreTaskAction
{
    public function __construct(
        protected StoreAttachTagsAction $storeAttachTagsAction
    ) {}

    public function execute(array $data): Task
    {
        $newTask = Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        if (isset($data['tags'])) {
            $this->storeAttachTagsAction->execute($newTask, $data['tags']);
        }

        return $newTask;
    }
}
