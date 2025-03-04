<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetRankingRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Se desejar proteger o endpoint, retorne true somente para usuários autenticados
        return true;
    }

    public function rules(): array
    {
        return [
            'movement' => 'required|integer|min:1',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
             'movement' => $this->route('movement'),
        ]);
    }
}
