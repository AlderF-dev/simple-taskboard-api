<?php

namespace App\Actions\Tasks;

use App\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GetTasksAction
{
    public function execute(
        string $sort = 'desc',
        int $limit = 5,
        int $page = 1
    ): Collection {

        return Task::with('tags')->get();

        // return new LengthAwarePaginator(
        //     total: $tasks->count(),
        //     items: $tasks->orderBy('created_at', $sort)->skip(($page - 1) * $limit)->take($limit)->get(),
        //     perPage: $limit,
        //     currentPage: $page,
        // );
    }
}
