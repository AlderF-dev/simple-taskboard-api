<?php

namespace App\Actions\Tags;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class StoreAttachTagsAction
{
    public function execute(Task $task, array $tags)
    {
        foreach ($tags as $tag) {
            // Get or create the tag
            $newTag = Tag::firstOrCreate(['label' => $tag]);

            $currentTags = $task->tags;

            // If attached but not in $tags, deattach
            if ($currentTags->contains($newTag->id) && !in_array($newTag->label, $tags)) {
                $task->tags()->detach($newTag);
            }

            // If not attached and in $tags, attach
            if (!$currentTags->contains($newTag->id) && in_array($newTag->label, $tags)) {
                $task->tags()->attach($newTag);
            }
        }
    }
}
