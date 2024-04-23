<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'string|min:1|max:64',
            'code' => 'string|min:1|max:64',
        ];
    }
    public function messages()
    {
        return [
            'max' => 'Используйте в поле :attribute максимум 64 символа.',
            'min' => 'Используйте в поле :attribute минимум 1 символа.',
            'string'=> 'Используйте в поле :attribute строковый символа.',
        ];
    }
}
