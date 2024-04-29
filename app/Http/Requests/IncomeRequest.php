<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'created_at' => 'required|date_format:Y-m-d H:i:s',
            'updated_at' => 'required|date_format:Y-m-d H:i:s',
        ];
    }
}
