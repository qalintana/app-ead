<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

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
            'id' => $this->id,
            'status' => $this->status,
            'status_label' =>
                    isset($this->statusOptions[$this->status]) ?
                    $this->statusOptions[$this->status] : 'Not found' ,
            'description' => $this->description,
            'user' => new UserResource($this->user),
            'lesson' => new LesonResource($this->lesson),
            // 'replies' => new LesonResource($this->replies),
            'dt_updated' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

        ];
    }
}
