<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:64',
            'path' => 'required|file|mimes:jpeg,jpg,png,webp',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute',
            'max' => 'Используйте в поле :attribute максимум 64 символа.',
            'min' => 'Используйте в поле :attribute минимум 1 символа.',
        ];
    }
}
