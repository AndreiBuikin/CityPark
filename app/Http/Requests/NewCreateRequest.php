<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:1|max:64',
            'content' => 'required|string|min:1|max:255',
            'photo' => 'required|file|mimes:jpeg,jpg,png,webp',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute',
            'title.max' => 'Используйте в поле :attribute максимум 64 символа.',
            'content.max' => 'Используйте в поле :attribute максимум 255 символа.',
            'min' => 'Используйте в поле :attribute минимум 1 символа.',
            'string'=> 'Используйте в поле :attribute строковый символа.',
        ];
    }
}
