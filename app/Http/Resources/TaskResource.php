<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        Log::debug($this->whenLoaded('tags'));
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'completed' => $this->completed,
            'tags' => $this->whenLoaded('tags', TagResource::collection($this->tags()->get() ?? []), 'null'),
            'created_at' => $this->created_at->format('Y/m/d H:i:s'),
        ];
    }
}
