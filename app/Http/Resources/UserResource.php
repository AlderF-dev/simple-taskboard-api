<?php

namespace App\Http\Resources;

use App\Actions\Users\GetUserNoticesAction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $viewable = $request->user()->id === $this->id;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->when($viewable, $this->email),
            'email_verified_at' => $this->email_verified_at
        ];
    }
}
