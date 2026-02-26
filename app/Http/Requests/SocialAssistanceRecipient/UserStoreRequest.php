<?php

namespace App\Http\Requests\SocialAssistanceRecipient;

use Illuminate\Foundation\Http\FormRequest;

class SocialAssistanceRecipientStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'social_assistance_id' => 'required|exists:social_assistances,id',
            'head_of_family_id' => 'required|exists:head_of_families,id',
            'amount' => 'required|numeric',
            'reason' => 'required|string',
            'bank' => 'required|string',
            'account_number' => 'required|string',
            'proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }
}
