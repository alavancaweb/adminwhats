<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sabados extends Model
{
    use HasFactory;

    protected $fillable = [
        'inicio',
        'pausa',
        'retorno',
        'fim',
        'cod_estabel'
    ];
}
