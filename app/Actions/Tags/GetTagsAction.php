<?php

namespace App\Actions\Tags;

use App\Models\Tag;
use Illuminate\Support\Collection;

class GetTagsAction
{
    public function execute(): Collection
    {
        return Tag::all();
    }
}
