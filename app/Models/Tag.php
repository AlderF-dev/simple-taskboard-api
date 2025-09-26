<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'label',
    ];

    /**
     * Disabled Timestamps
     */
    public $timestamps = false;

    /**
     * Get the tags for the blog post.
     */
    public function tasks(): BelongsToMany
    {
        return $this->BelongsToMany(Task::class, 'task_tag');
    }
}
