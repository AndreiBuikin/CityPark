<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'quantity' => 'integer|min:1',
            'total' => 'numeric|regex:/^\d{0,10}(\.\d{1,2})?$/',
            'souvenir_id' => 'integer|min:1',
            'user_id' => 'integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'min' => 'Используйте в поле :attribute минимум 1 символа.',
        ];
    }
}
