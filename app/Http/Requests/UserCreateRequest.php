<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:64',
            'surname' => 'required|string|min:1|max:64',
            'patronymic' => 'string|min:1|max:64',
            'password' => 'required|string|min:1|max:255|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d\s])/',
            'login' => 'required|string|min:1|max:255|unique:users',
            'photo' => 'file|mimes:jpeg,jpg,png,webp',
            'phone' => 'required|string|min:1|max:11|unique:users',
            'role_id' => 'nullable|integer|min:1'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute',
            'name.max' => 'Используйте максимум 64 символа.',
            'surname.max' => 'Используйте максимум 64 символа.',
            'password.max' => 'Используйте максимум 255 символа.',
            'login.max' => 'Используйте максимум 255 символа.',
            'password.regex' => 'Используйте большую и маленькую букву, цифру и спец символ.',
            'unique' => ':attribute уже занят.',
        ];
    }
}
