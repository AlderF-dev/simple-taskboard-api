<?php

namespace App\Http\Controllers;

use App\Actions\Tags\StoreAttachTagsAction;
use App\Actions\Tasks\DeleteTaskAction;
use App\Actions\Tasks\GetTasksAction;
use App\Actions\Tasks\StoreTaskAction;
use App\Actions\Tasks\UpdateTaskAction;
use App\Http\Requests\DeleteTaskRequest;
use App\Http\Requests\GetTasksRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Exception;
use Illuminate\Support\Facades\DB;
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
        StoreTaskAction $storeTaskAction,
        StoreAttachTagsAction $storeAttachTagsAction
    ) {
        $data = $request->all();

        try {
            DB::beginTransaction();

            $newTask = $storeTaskAction->execute($data);

            if (isset($data['tags'])) {
                $storeAttachTagsAction->execute($newTask, $data['tags']);
            }

            DB::commit();

            return new TaskResource($newTask);
        } catch (Exception $e) {
            DB::rollBack(); // Roll back all changes

            // Return or throw a meaningful error
            throw new \RuntimeException('Failed to store task. Please try again.', 0, $e);
        }
    }

    public function update(
        UpdateTaskRequest $request,
        Task $task,
        UpdateTaskAction $updateTaskAction
    ) {
        $data = $request->all();

        Log::debug($data);

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
