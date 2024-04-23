<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttractionUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'string|min:1|max:64',
            'description' => 'string|min:1|max:255',
            'category_attraction_id' => 'integer|min:1',
            'photo' => 'file|mimes:jpeg,jpg,png,webp',
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
