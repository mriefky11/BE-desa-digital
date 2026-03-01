<?php

namespace App\Http\Requests\Development;

use Illuminate\Foundation\Http\FormRequest;

class DevelopmentUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'thumbnail' => 'nullable|string|mime:jpg,png,jpeg|max:2048',
            'name' => 'required|string',
            'description' => 'required|string',
            'person_in_charge' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'amount' => 'required|numeric',
            'status' => 'required|string',
        ];
    }
}
