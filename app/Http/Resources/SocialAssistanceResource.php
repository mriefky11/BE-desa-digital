<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocialAssistanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'thumbnail' => $this->thumbnail,
            'name' => $this->name,
            'category' => $this->category,
            'amount' => $this->amount,
            'provider' => $this->provider,
            'description' => $this->description,
            'is_available' => $this->is_available,
        ];
    }
}
