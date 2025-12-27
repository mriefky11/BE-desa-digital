<?php

namespace App\Http\Requests\User;

use App\Models\HeadOfFamily;
use Illuminate\Foundation\Http\FormRequest;

class HeadOffamilyUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email' . HeadOfFamily::find($this->route('head_of_family'))->user_id,
            'password' => 'nullable|string|min:8',
            'profile_picture' => 'nullable|string|mime:jpg,png,jpeg|max:2048',
            'indetify_number' => 'required|integer',
            'gender' => 'required|string|in:male,female',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string',
            'occupation' => 'required|string',
            'marital_status' => 'required|string|in:married,single',
        ];
    }
}
