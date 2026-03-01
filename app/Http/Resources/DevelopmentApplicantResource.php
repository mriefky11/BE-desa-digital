<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DevelopmentApplicantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'development_id' => $this->development_id,
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
            'status' => $this->status
        ];
    }
}
