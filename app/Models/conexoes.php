<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conexoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'departamento',
        'cod_estabel'
    ];
}
