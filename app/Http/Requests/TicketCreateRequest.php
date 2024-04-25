<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'type_tickets_id' => 'required|integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute',
        ];
    }
}
