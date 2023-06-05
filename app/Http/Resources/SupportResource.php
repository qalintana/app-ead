<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'status' => $this->status,
            'status_label' =>
                    isset($this->statusOptions[$this->status]) ?
                    $this->statusOptions[$this->status] : 'Not found' ,
            'description' => $this->description,
            'user' => new UserResource($this->user),
            'lesson' => new LesonResource($this->lesson),
        ];
    }
}
