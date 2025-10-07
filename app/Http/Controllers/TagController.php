<?php

namespace App\Http\Controllers;

use App\Actions\Tags\GetTagsAction;
use App\Actions\Tasks\DeleteTaskAction;
use App\Actions\Tasks\GetTasksAction;
use App\Http\Requests\DeleteTaskRequest;
use App\Http\Requests\GetTasksRequest;
use App\Http\Resources\TagCollection;
use App\Http\Resources\TaskCollection;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    public function get(
        GetTasksRequest $request,
        GetTagsAction $getTagsAction
    ) {
        $data = $getTagsAction->execute();

        return new TagCollection($data);
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
