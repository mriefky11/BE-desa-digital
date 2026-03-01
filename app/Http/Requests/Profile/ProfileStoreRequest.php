<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'thumbnail' => 'nullable|string|mime:jpg,png,jpeg|max:2048',
            'name' => 'required|string',
            'about' => 'required|string',
            'headman' => 'required|string',
            'people' => 'required|integer',
            'agricultural_area' => 'required',
            'total_area' => 'required',
            'images' => 'nullable',
            'images.*' => 'required|string|mime:jpg,png,jpeg|max:2048',
        ];
    }

    public function attributes()
    {
        return [
            'thumbnail' => 'thumbnail',
            'name' => 'Nama',
            'about' => 'Deskripsi',
            'headman' => 'Kepala Desa',
            'people' => 'Jumlah Penduduk',
            'agricultural_area' => 'Luas Lahan Pertanian',
            'total_area' => 'Luas Desa',
            'images' => 'Foto Desa',
        ];
    }
}
