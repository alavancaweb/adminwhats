<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chamados extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'descricao',
        'celular',
        'cod_estabel'
    ];
}
