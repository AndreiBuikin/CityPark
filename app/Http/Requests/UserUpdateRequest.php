<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|min:1|max:64',
            'surname' => 'string|min:1|max:64',
            'patronymic' => 'string|min:1|max:64',
            'password' => 'string|min:1|max:255|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d\s])/',
            'login' => 'string|min:1|max:255',
            'photo' => 'file|mimes:jpeg,jpg,png,webp',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Используйте максимум 64 символа.',
            'surname.max' => 'Используйте максимум 64 символа.',
            'password.max' => 'Используйте максимум 255 символа.',
            'login.max' => 'Используйте максимум 255 символа.',
            'password.regex' => 'Используйте большую и маленькую букву, цифру и спец символ.',
        ];
    }
}
