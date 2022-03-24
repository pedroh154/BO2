<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'endereco',
        'nome',
        'cadastro_nacional',
        'cep',
        'fone',
        'obs',
        'cidade_id',
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

    public function cidade(){
        return $this->belongsTo(Cidade::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
