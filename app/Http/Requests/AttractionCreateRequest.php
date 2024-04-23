<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttractionCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:64',
            'description' => 'required|string|min:1|max:255',
            'category_attraction_id' => 'required|integer|min:1',
            'photo' => 'required|file|mimes:jpeg,jpg,png,webp',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute',
            'name.max' => 'Используйте в поле :attribute максимум 64 символа.',
            'description.max' => 'Используйте в поле :attribute максимум 255 символа.',
            'min' => 'Используйте в поле :attribute минимум 1 символа.',
        ];
    }
}
