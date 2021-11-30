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
        ];
    }
}
