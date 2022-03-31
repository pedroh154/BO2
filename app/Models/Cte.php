<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cte extends Model
{
    use HasFactory;
    use Sortable;
    
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

    protected $sortable = ['numero_nf', 'valor_cte', 'volume', 'obs', 'data_chegada', 'numero_cte', 'finalizado', 'data_entrega',
                           'tipo_pagamento', 'valor_nf', 'remetente_id', 'destinatario_id', 'cidade_remetente_id', 'cidade_destinataria_id'];

    public function destinatario(){
        return $this->belongsTo(Cliente::class);
    }

    public function remetente(){
        return $this->belongsTo(Cliente::class);
    }

    public function cidade_remetente(){
        return $this->belongsTo(Cidade::class);
    }

    public function cidade_destinataria(){
        return $this->belongsTo(Cidade::class);
    }

    public function transportadora(){
        return $this->belongsTo(Transportadora::class);
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
