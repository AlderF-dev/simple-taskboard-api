<?php

namespace App\Http\Controllers;

use App\Actions\Tasks\DeleteTaskAction;
use App\Actions\Tasks\GetTasksAction;
use App\Actions\Tasks\StoreTaskAction;
use App\Actions\Tasks\UpdateTaskAction;
use App\Http\Requests\DeleteTaskRequest;
use App\Http\Requests\GetTasksRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function get(
        GetTasksRequest $request,
        GetTasksAction $getTasksAction
    ) {
        $data = $getTasksAction->execute();

        return new TaskCollection($data);
    }

    public function store(
        StoreTaskRequest $request,
        StoreTaskAction $storeTaskAction
    ) {
        $data = $request->all();

        return $storeTaskAction->execute($data);
    }

    public function update(
        StoreTaskRequest $request,
        Task $task,
        UpdateTaskAction $updateTaskAction
    ) {
        $data = $request->all();

        return $updateTaskAction->execute($task, $data);
    }

    public function delete(
        DeleteTaskRequest $request,
        Task $task,
        DeleteTaskAction $deleteTaskAction
    ) {
        Log::debug($task);

        return $deleteTaskAction->execute($task);
    }
}
