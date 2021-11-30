<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatosRequest extends FormRequest
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
            'nome' => 'required|String',
            'fone' => 'nullable|numeric',
            'endereco' => 'nullable|string',
            'desc' => 'nullable|string',
        ];
    }
}
