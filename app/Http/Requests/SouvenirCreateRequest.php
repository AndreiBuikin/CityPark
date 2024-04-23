<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SouvenirCreateRequest extends ApiRequest
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
            'price' => 'required|numeric|regex:/^\d{0,10}(\.\d{1,2})?$/',
            'category_souvenir_id' => 'required|integer|min:1',
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
            'price.numeric' => 'Поле :attribute должно быть числом.',
            'price.regex' => 'Поле :attribute должно быть числом с максимальным размером 12 цифр и 2 знаками после запятой.',
        ];
    }
}
