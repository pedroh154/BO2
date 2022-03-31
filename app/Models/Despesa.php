<?php

namespace App\Models;
use Kyslik\ColumnSortable\Sortable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;
    use Sortable;
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'categoria',
        'data',
        'valor',
        'desc',
        'user_id',
    ];

    protected $sortable = ['categoria', 'valor', 'data', 'desc'];

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
