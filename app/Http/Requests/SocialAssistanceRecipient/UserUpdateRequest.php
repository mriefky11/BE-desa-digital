<?php

namespace App\Http\Requests\SocialAssistanceRecipient;

use Illuminate\Foundation\Http\FormRequest;

class SocialAssistanceRecipientUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'social_assistance_id' => 'sometimes|required|exists:social_assistances,id',
            'head_of_family_id' => 'sometimes|required|exists:head_of_families,id',
            'amount' => 'sometimes|required|numeric',
            'reason' => 'sometimes|required|string',
            'bank' => 'sometimes|required|string',
            'account_number' => 'sometimes|required|string',
            'proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }
}
