<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'thumbnail' => 'required|string|mime:jpg,png,jpeg|max:2048',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required|string',
            'is_active' => 'required|boolean',
        ];
    }
}
