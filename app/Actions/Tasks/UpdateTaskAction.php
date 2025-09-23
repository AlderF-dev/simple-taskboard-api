<?php

namespace App\Actions\Tasks;

use App\Models\Task;

class UpdateTaskAction
{
    public function execute(Task $task,  array $data): Task
    {
        $task->fill($data);
        $task->save();
        $task->refresh();

        return $task;
    }
}
