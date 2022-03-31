<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Contato extends Model
{
    use HasFactory;
    use Sortable;
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fone',
        'nome',
        'desc',
        'endereco',
        'user_id',
    ];

    protected $sortable = ['fone', 'nome', 'desc', 'endereco'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /* RELAÇÕES */
    public function users(){
        return $this->belongsTo(User::class);
    }

    
}
