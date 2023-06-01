<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mensagens extends Model
{
    use HasFactory;

    protected $fillable = [
        'pergunta',
        'resposta',
        'status',
        'cod_estabel'
    ];
}
