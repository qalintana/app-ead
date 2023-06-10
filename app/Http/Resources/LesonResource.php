<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LesonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => ucwords(strtolower($this->name)),
            'description' => isset($this->description) ? $this->description : 'Not found 😂⚠️⚠️',
            'video' => $this->video,
            'views' => $this->views

        ];
    }
}
