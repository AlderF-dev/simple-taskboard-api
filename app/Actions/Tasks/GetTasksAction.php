<?php

namespace App\Actions\Tasks;

use App\Models\Task;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GetTasksAction
{
    public function execute(
        User $user,
        string $sort = 'desc',
        int $limit = 5,
        int $page = 1
    ): Collection {

        return Task::with('tags')->get();
    }
}
