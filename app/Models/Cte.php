<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cte extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_nf',
        'pode_alterar',
        'valor_cte',
        'volume',
        'obs',
        'data_chegada',
        'numero_cte',
        'finalizado',
        'data_entrega',
        'tipo_pagamento',
        'valor_nf',
        'remetente_id',
        'destinatario_id',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
