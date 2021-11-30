<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cte extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_nf',
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
        'cidade_remetente_id',
        'cidade_destinataria_id',
        'user_id',
    ];

    public function users(){
        return $this->hasOne(User::class);
    }

    public function clientes(){
        return $this->hasOne(Cliente::class);
    }

    public function cidades(){
        return $this->hasMany(Cidade::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'cidade_destinataria_id' => 'integer',
        'cidade_remetente_id' => 'integer',
    ];
}
