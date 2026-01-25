<?php

namespace App\Http\Requests\FamilyMember;

use App\Models\FamilyMember;
use Illuminate\Foundation\Http\FormRequest;

class FamilyMemberUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email' . FamilyMember::find($this->route('head_of_family'))->user_id,
            'password' => 'required|string|min:8',
            'profile_picture' => 'required|string|mime:jpg,png,jpeg|max:2048',
            'indetify_number' => 'required|integer|max:255',
            'gender' => 'required|string|in:male,female',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string',
            'occupation' => 'required|string',
            'marital_status' => 'required|string|in:married,single',
            'relation' => 'required|string|in:wife,child,husband',
        ];
    }
}
