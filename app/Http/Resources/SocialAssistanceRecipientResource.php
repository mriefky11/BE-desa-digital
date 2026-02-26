<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SocialAssistanceRecipientResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'social_assistance_id' => $this->social_assistance_id,
            'head_of_family_id' => $this->head_of_family_id,
            'amount' => $this->amount,
            'reason' => $this->reason,
            'bank' => $this->bank,
            'account_number' => $this->account_number,
            'proof' => $this->proof,
            'status' => $this->status,
        ];
    }
}
