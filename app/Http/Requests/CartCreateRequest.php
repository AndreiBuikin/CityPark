<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quantity' => 'required|integer|min:1',
            'total' => 'numeric|regex:/^\d{0,10}(\.\d{1,2})?$/',
            'souvenir_id' => 'required|integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute',
            'min' => 'Используйте в поле :attribute минимум 1 символа.',
        ];
    }
}
