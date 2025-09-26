<?php

namespace App\Actions\Tasks;

use App\Actions\Tags\StoreAttachTagsAction;
use App\Models\Task;

class UpdateTaskAction
{
    public function __construct(
        protected StoreAttachTagsAction $storeAttachTagsAction
    ) {}

    public function execute(Task $task,  array $data): Task
    {
        $task->fill($data);
        $task->save();
        $task->refresh();


        if (isset($data['tags'])) {
            $this->storeAttachTagsAction->execute($task, $data['tags']);
        }


        return $task;
    }
}
