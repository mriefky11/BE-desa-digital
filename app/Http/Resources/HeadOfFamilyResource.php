<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeadOfFamilyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
            'profile_picture' => $this->profile_picture,
            'indetify_number' => $this->indetify_number,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'phone_number' => $this->phone_number,
            'occupation' => $this->occupation,
            'marital_status' => $this->marital_status
        ];
    }
}
