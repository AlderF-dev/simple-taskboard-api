<?php

namespace App\Actions\Tags;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class StoreAttachTagsAction
{
    public function execute(Task $task, array $tags)
    {
        // Map input labels to tag IDs
        $tagIds = collect($tags)->map(function ($label) {
            return Tag::firstOrCreate(['label' => $label])->id;
        })->toArray();

        // Sync tags: attach new ones, detach missing ones
        $task->tags()->sync($tagIds);
    }
}
