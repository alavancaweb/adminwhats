<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saudacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'saudacao',
        'periodicidade',
        'cod_estabel'
    ];
}
