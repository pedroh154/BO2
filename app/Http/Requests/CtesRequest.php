<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

/* https://www.csrhymes.com/2019/06/22/using-the-unique-validation-rule-in-laravel-form-request.html */

class CtesRequest extends FormRequest
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
        $id = $this->request->get('id');
        return [
            'numero_nf' => 'required|numeric|unique:ctes,numero_nf,' . $this->id,
            'valor_nf' => 'required|numeric',
            'numero_cte' => 'required|numeric|unique:ctes,numero_cte,' . $this->id,
            'valor_cte' => 'required|numeric',
            'data_chegada' => 'required|date',
            'data_entrega' => 'nullable|date',
            'obs' => 'nullable|string',
            'tipo_pagamento' => 'required',
            'volume' => 'required|numeric',
            'cidade_remetente_id' => 'required|numeric',
            'cidade_destinataria_id' => 'required|numeric',
            'remetente_id' => 'required|numeric',
            'destinatario_id' => 'required|numeric',
        ];
    }

    public function messages() 
    {
        return [
        'numero_nf.required' => 'O campo Número da NF é obrigatório',
        'numero_nf.unique' => 'Já existe uma NF cadastrada com esse número',
        'numero_cte.required' => 'O campo Número do CT-e é obrigatório',
        'numero_cte.unique' => 'Já existe um CT-e cadastrado com esse número',
        'cidade_remetente_id.required' => 'A cidade remetente é obrigatória',
        'cidade_destinataria_id.required' => 'A cidade destinatária é obrigatória',
        'remetente_id.required' => 'O cliente remetente é obrigatório',
        'destinatario_id.required' => 'O cliente destinatário é obrigatório',
    ];
    }
}
