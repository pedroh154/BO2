<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'numero_nf' => 'required',
            'valor_nf' => 'required|numeric',
            'numero_cte' => 'required',
            'valor_cte' => 'required|numeric',
            'data_chegada' => 'required|date',
            'data_entrega' => 'date',
            'tipo_pagamento' => 'required|numeric',
            'volume' => 'required|numeric',
        ];
    }
}
