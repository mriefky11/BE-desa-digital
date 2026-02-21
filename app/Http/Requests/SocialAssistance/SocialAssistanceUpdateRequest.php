<?php

namespace App\Http\Requests\User;

use App\Models\HeadOfFamily;
use Illuminate\Foundation\Http\FormRequest;

class SocialAssistanceUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'thumbnail' => 'nullable|string|mime:jpg,png,jpeg|max:2048',
            'name' => 'required|string',
            'category' => 'required|string',
            'amount' => 'required|numeric',
            'provider' => 'required|string',
            'description' => 'required|string',
            'is_available' => 'required|boolean',
        ];
    }
}
