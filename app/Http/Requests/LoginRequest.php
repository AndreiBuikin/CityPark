<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'login'    => 'required|string|max:255|min:1',
            'password' => 'required|string|max:255|min:1',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute',
            'max' => 'Используйте максимум 255 символа в поле :attribute'
        ];
    }
}
