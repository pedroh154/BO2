<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DespesasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data' => 'required|Date',
            'valor' => 'required|numeric',
            'categoria' => ['required',
                Rule::in(['Água', 'Luz', 'Manutenção', 'Aluguel', 'Outros'])],
            'desc' => 'nullable|string',
        ];
    }
}
