<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'nome' => 'required|string',
            'cep' => 'required|numeric',
            'endereco' => 'required|string',
            'cadastro_nacional' => 'required|numeric',
            'fone' => 'nullable|numeric',
            'obs' => 'nullable|string',
        ];
    }

    public function messages() 
    {
        return [
        'nome.required' => 'O campo Nome é obrigatório',
        'cep.required' => 'O campo CEP é obrigatório',
        'endereco.required' => 'O campo Endereço é obrigatório',
        'cadastro_nacional.required' => 'O campo CPF/CNPJ é obrigatório',
    ];
    }
}
